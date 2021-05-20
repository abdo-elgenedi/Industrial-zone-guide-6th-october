<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FactoryRequest extends FormRequest
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
        if ($this->is('factory/profile')) {
            $rules = [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:factories,email,' . Auth::user()->id],
                'description' => ['required', 'string'],
                'cat_id' => ['required', 'exists:categories,id'],
                'image' => ['image'],

            ];
        }
        else{
            $rules = [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:factories,id'],
                'description' => ['required', 'string'],
                'cat_id' => ['required', 'exists:categories,id'],
                'image' => ['image'],
                'password' => ['required','confirmed','min:8'],

            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
          'required'=>'هذا الحقل مطلوب',
          'email'=>'يجب ان يكون البريد في شكل example@domain.co',
          'unique'=>'هذا البريد يخص مصنع اخر',
          'string'=>'يجب ان يكون الحقل حروف وارقام فقط',
          'exists'=>'برجاء اختيار تصنيف صحيح',
          'image'=>'هذا الحقل يجب ان يكون صور فقط',
          'password.confirmed'=>'الرقم السري غير متطابق',
          'password.min'=>'يجب ان يكون الرقم السي علي الاقل 8 احرف وارقام',
        ];
    }
}
