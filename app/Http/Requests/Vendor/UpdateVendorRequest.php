<?php

namespace App\Http\Requests\Vendor;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
       
        $id =  $this->request->get("id");
        $rules =  [
            'first_name' => ['string', 'max:100'],
            'last_name' => ['string', 'max:100'], 
           
            'email' => ['email' , Rule::unique('vendors')->ignore($id)->whereNull('deleted_at') ] ,
            'password' => ['string' , 'nullable'],
            'phone' => ['numeric', 'digits_between:11,11' ,Rule::unique('vendors')->ignore($id)->whereNull('deleted_at')],
            'store_name' => ['string', 'max:100'],   
            'store_description' => ['string'],   
            'category_id' => [ 'numeric'], 
            'city_id' => ['numeric'], 
            'logo_image' => ['image'],
            'background_image' => [ 'image'],
            'company_registration_photo' => [ 'image'],
            'national_id_front_photo' => [ 'image'],
            'national_id_back_image' => [ 'image'],
            'expiration_date' => [ 'date_format:Y-m-d'],   
            'client_ratio' => ['numeric'], 
            'client_vip_ratio' => ['numeric'], 
            'delivery' => ['numeric'  , 'nullable'], 
            'discount_ratio' => ['numeric'], 
            
        ];
        return $rules;
    }
   
}
