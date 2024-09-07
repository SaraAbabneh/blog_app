<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    
     public function rules()
     {
         return [
             'username' => 'required',
             'name' => 'required|alpha', // Only allows alphabetic characters
             'email' => 'required|email',
             'password' => [
                 'required',
                 'min:8', // Minimum of 8 characters
                 'regex:/[A-Z]/', // Must contain at least one uppercase letter
                 'regex:/[a-z]/', // Must contain at least one lowercase letter
                 'regex:/[0-9]/', // Must contain at least one number
             ],
         ];
     }
     

    public function messages()
{
    return [
        'username.required' => 'Username is required',
        'name.required' => 'Name is required',
        'name.alpha' => 'Name can only contain letters',
        'email.required' => 'Email is required',
        'email.email' => 'Please enter a valid email address',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 8 characters',
        'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, and one number',
    ];
}

}