<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminRequest extends FormRequest
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
        if ($this->is('admin/profile')) {
            $rules = [
                'name' => ['required', 'string'],
                'username' => ['required', 'string', 'unique:admins,username,' . Auth::user()->id],
                'email' => ['required', 'email', 'unique:admins,email,' . Auth::user()->id],
                'mobile' => ['required', 'string', 'unique:admins,mobile,' . Auth::user()->id],
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
          'email.unique'=>'هذا البريد يخص ادمن اخر',
          'mobile.unique'=>'رقم الهاتف يخص ادمن اخر',
          'username.unique'=>'اسم المستخدم يخص ادمن اخر',
          'string'=>'يجب ان يكون الحقل حروف وارقام فقط',
          'image'=>'هذا الحقل يجب ان يكون صور فقط',
          'password.confirmed'=>'الرقم السري غير متطابق',
          'password.min'=>'يجب ان يكون الرقم السي علي الاقل 8 احرف وارقام',
        ];
    }
}
