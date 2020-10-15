<?php

namespace App\Http\Requests\Bid;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Status\Order as OrderStatus;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'string|max:1000',
            'price' => ['regex:/^[0-9]*[.,]?[0-9]+$/'],
            'timelimit' => 'integer',
            'order_id' => [
                'integer',
                Rule::exists('orders', 'id')->where(function ($query) {
                    $query->where('status', OrderStatus::ACCEPTING);
                })
            ]
        ];
    }
}
