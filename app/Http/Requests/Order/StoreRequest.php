<?php

namespace App\Http\Requests\Order;

use App\Models\Status\Order as OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|string',
            'description' => 'string|max:1000',
            'price' => ['required', 'regex:/^[0-9]*[.,]?[0-9]+$/'],
            'timelimit' => 'required|integer',
            'accepting_end_at' => 'required|date'
        ];
    }
}
