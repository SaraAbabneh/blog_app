<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', //  photo optional
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Phone number must be between 10 and 15 digits',
            'address.required' => 'Address is required',
            'address.max' => 'Address cannot exceed 255 characters',
            'gender.required' => 'Please select your gender',
            'gender.in' => 'The selected gender is invalid',
            'photo.required' => 'Please upload a photo',
            'photo.image' => 'The file must be an image',
            'photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif',
            'photo.max' => 'The photo may not be larger than 2MB',
        ];
    }
}
