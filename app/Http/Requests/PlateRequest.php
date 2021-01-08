<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlateRequest extends FormRequest
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
        return 
        [
            'name' => 'required|max:255',
            'description' => 'required|max:50000',
        ];
    } 
       
    public function messages(){
       return 
        [
            'name.required' => 'Поле Название обязательно для заполнения',
            'description.required'  => 'Поле Описание обязательно для заполнения',
            'name.max' => 'Превышено максимально количество символов в поле "Название пластинки"',
            'description.max' => 'Превышено максимально количество символов в поле "Описание"'
        
        ];
    }    
        
    
}
