<?php

namespace App\Http\Requests\Order;

use App\Models\Status\Order as StatusOrder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
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
            'filter' => Rule::in([
                StatusOrder::ACCEPTING,
                StatusOrder::CONSIDERATION,
                StatusOrder::WAITING,
                StatusOrder::COMPLETED
            ])
        ];
    }
}
