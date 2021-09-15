<?php

namespace App\Http\Requests\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UserRequest extends FormRequest
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
        
            $id = $this->request->get("id") ;
         
            $rules =  [
                'user_name' => ['string', 'max:100' ,'required'],
                'name' => ['string', 'max:100','required'], 
              
                'email' => ['email' , Rule::unique('users')->ignore($id)->whereNull('deleted_at') ] ,
                'password' => ['string' ,'nullable'],
                'phone' => ['required' ,Rule::unique('users')->ignore($id)->whereNull('deleted_at')],
                'image' => ['image']
            ];
            if ($this->isMethod('POST') ){
                $rules['password'][] = 'required';
            }
           
            return $rules;
        
    }
    // public $validator = null;
    // protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    // {
    //     $this->validator = $validator;
    // }
}
