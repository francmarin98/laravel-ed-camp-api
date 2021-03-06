<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class PrecioUpdateRequest extends FormRequest
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
            'type' => ['in:Becado,Pre-venta,Regular', Rule::unique('precios', 'type')
                ->ignore($this->precio),],
            'cost' => 'numeric',
            'active' => 'boolean'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'type.in' => 'The type entered is not valid, it is only accepted: Becado,Pre-venta,Regular ',
        ];
    }

}
