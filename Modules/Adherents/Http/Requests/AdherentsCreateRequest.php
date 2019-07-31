<?php

namespace Modules\Adherents\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdherentsCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              =>'max:255',
            'firstname'         =>'max:255',
            'street'            =>'max:255',
            'city'              =>'max:255',
            'zip'               =>'max:5',
            'street_number'     =>'max:5',
            'mobile_number'     =>'max:10',
            'phone_number'      =>'max:10',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
