<?php

namespace App\Http\Requests\Order;

use App\Models\Status\Order as OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'present|string',
            'description' => 'string|max:1000',
            'price' => ['present', 'regex:/^[0-9]*[.,]?[0-9]+$/'],
            'timelimit' => 'present|integer',
            'status' => ['string', Rule::in([
                OrderStatus::CONSIDERATION,
                OrderStatus::COMPLETED
            ])],
            'executor_id' => [
                'integer',
                Rule::exists('bids', 'executor_id')->where(function ($query) {
                    $query->where('order_id', 'id');
                })
            ],
        ];
    }
}
