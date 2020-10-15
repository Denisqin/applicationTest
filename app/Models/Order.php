<?php

namespace App\Models;

use App\Helpers\OrderStatus\Completed;
use App\Helpers\OrderStatus\Consideration;
use App\Http\Resources\Order\OrderCollection;
use App\Contracts\OrderStatus as IOrderStatus;
use App\Models\Status\Order as OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public const FILTER_IN_WORK = 'inWork';
    public const FILTER_SUBMITTED = 'submitted';
    protected $guarded = [];
    protected $status;

    /**
     * @param $value
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    /**
     * @param $value
     * @return string
     */
    public function getPriceAttribute($value): string
    {
        return $value / 100;
    }

    /**
     * @param $value
     */
    public function setTimelimitAttribute($value)
    {
        $this->attributes['timelimit'] = $value * 3600;
    }

    /**
     * @return string
     */
    public function getTimelimitAttribute($value): string
    {
        return $value / 3600;
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * @param $request
     * @return OrderCollection
     */
    public static function getForExecutor($request): OrderCollection
    {
        $filter = $request->filter;
        $user = Auth::user();
        $orders = [];
        if ($filter == Order::FILTER_SUBMITTED) {
            foreach ($user->bids as $bid) {
                $orders = $bid->order;
            }
        } elseif ($filter == Order::FILTER_IN_WORK) {
            foreach ($user->bids as $bid) {
                if ($bid->order->status == OrderStatus::WAITING && $bid->order->executor_id === $user->id) {
                    $orders = $bid->order;
                }
            }
        } else {
            $orders = Order::where(['status' => OrderStatus::ACCEPTING])->get();
        }
        return new OrderCollection($orders);
    }

    /**
     * @param null $request
     * @return OrderCollection
     */
    public static function filterCollection($request): OrderCollection
    {
        $user = Auth::user();
        if (isset($request['filter'])) {
            $orders = $user->orders()->where('status', $request['filter'])->get();
        } else {
            $orders = $user->orders;
        }
        return new OrderCollection($orders);
    }

    public function changeStatus(IOrderStatus $status) {
        $this->status = $status;
        $this->status->setOrder($this);
        $status->change();
    }

    public function userChangeStatus($status) {
        $canChangedStatuses  = [
            OrderStatus::CONSIDERATION => Consideration::class,
            OrderStatus::COMPLETED => Completed::class
        ];
        self::changeStatus(new $canChangedStatuses[$status]);
    }

    /**
     * @param mixed $value
     * @param null $field
     * @return Model|void|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return self::find($value) ?? abort(404, 'Заказ не найден');
    }
}
