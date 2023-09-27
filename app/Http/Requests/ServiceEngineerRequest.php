<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceEngineerRequest extends FormRequest
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
            'password' => $this->type == 'edit' ? '' : 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,15}$/',
            "contact_no" => 'required|regex:/^[+\d-]+$/',
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
            'password.required' => 'Password is required',
            'name.regex' => 'The name should only contain alphabetic characters, periods, and whitespace characters.',
            'password.regex' => 'The password must be between 8 and 15 characters long and must contain at least one uppercase letter, one lowercase letter, and one numeric digit.',
        ];
    }
}
