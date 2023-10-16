<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50|regex:/^[a-zA-Z.\s]+$/',
            'email' => ['required', 'max:100', 'regex:/^(\s?[^\s,]+@[^\s,]+\.[^\s,]+\s?)*(\s?[^\s,]+@[^\s,]+\.[^\s,]{2,5})$/'],
            "contact_no" => 'required|regex:/^[+\d-]+$/',
            "address" => 'required|max:100',
            "client_type"=>'required',
            'image' =>  ($this->hasFile('image') ) ? 'image|mimes:jpeg,png,jpg|max:1024' : 'nullable',
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'Name is required.',
            'name.max' => 'Name may not be greater than 50 characters.',
            'email.required' => 'Email is required.',
            'contact_no.required' => 'Contact No is required',
            'client_type.required'=> 'Customer type is required',
            'address.required'=> 'Address is required',
            'name.regex' => 'The name should only contain alphabetic characters, periods, and whitespace characters.',
        ];
    }
}
