<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\BidStatus as IBidStatus;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bid extends Model
{
    protected $guarded = [];

    protected $status;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

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

    public function executor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function changeStatus(IBidStatus $status) {
        $this->status = $status;
        $this->status->setBid($this);
        $status->change();
    }

    /**
     * @param mixed $value
     * @param null $field
     * @return Model|void|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return self::find($value) ?? abort(404, 'Заявка не найдена');
    }
}
