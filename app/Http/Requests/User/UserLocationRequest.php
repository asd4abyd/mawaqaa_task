<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserLocationRequest extends FormRequest
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
            'paci'      => 'required_without:area',
            'area'      => 'required_without:paci|alpha_num',
            'location'  => 'alpha_num',
            'is_active' => 'boolean',
        ];
    }
}
