<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::guard('vendor-api')->check() ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 'name', 'description', 'price', 'quantity', 'vendor_id', 'category_id'
        return [
            'name' => ['required','string', 'max:100'],
            'description' => ['string'],
            'price' => ['required' , 'numeric'],
            'quantity' => ['required', 'numeric'],

            'category_id' => ['numeric'],
        ];
    }
    public $validator = null;
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}
