<?php

namespace Modules\Adherents\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdherentsMailsCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'adherent_id'       =>'required',
                'email'             =>'required|email|max:255',
                'usage'             =>'max:255',
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
