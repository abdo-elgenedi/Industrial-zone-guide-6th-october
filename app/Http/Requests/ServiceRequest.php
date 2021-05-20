<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $rules=[
            'name'=>['required','string'],
            'price'=>['required','numeric'],
            'unit'=>['required','string'],
            'cat_id'=>['required','exists:factory_categories,id'],
            'description'=>['required'],
        ];
        if (isset($this->id)){
            $rules['image']=['image'];
        }else{
            $rules['image']=['required','image'];
        }
        return $rules;
    }

    public function messages()
    {
        return [
          'required'=>'هذا الحقل مطلوب',
          'exists'=>'هذا التصنيف غير موجود',
          'string'=>'هذا الحقل يجب ان يكون حروف وارقام فقط',
          'image'=>'يجب ان يكون صوره فقط',
          'numeric'=>'هذا الحقل يجب ان يكون ارقام فقط',
        ];
    }
}
