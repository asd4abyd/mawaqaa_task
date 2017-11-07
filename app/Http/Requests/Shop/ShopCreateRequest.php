<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class ShopCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if(auth()->user()->isAdmin()){
            return true;
        }


        return optional(shop()->getOneByUserId())->id==$this->offsetGet('id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->offsetUnset('_token');

        return [
            'name'             => 'required|string|max:255',
            'phone_1'          => 'required|string|max:255',
            'phone_2'          => 'nullable|string|max:255',
            'pref_description' => 'nullable|string|max:255',
            'description'      => 'required|string|max:255',
            'delivery_time'    => 'required|integer', // |between:15,720',   || 720 = 12 hours
            'delivery_charge'  => 'required|numeric',
        ];
    }
}
