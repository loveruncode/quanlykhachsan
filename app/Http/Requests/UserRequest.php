<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '_token' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|min:10|max:20',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,jpg,png,bmp,gif,svg',
                'max:2048', 
            ],
        ];
    }

    /**
     * Get custom validation messages for attributes.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '_token.required' => 'The token is required.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone.min' => 'The phone number must be at least 10 characters long.',
            'phone.max' => 'The phone number may not be greater than 20 characters.',
            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The selected gender is invalid.',
            'role.required' => 'The role field is required.',
            'role.in' => 'The selected role is invalid.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
            'avatar.required' => 'The avatar is required.',
            'avatar.file' => 'The avatar must be a file.',
            'avatar.image' => 'The avatar must be an image.',
            'avatar.mimes' => 'The avatar must be a valid image file (jpeg, jpg, png, bmp, gif, svg).',
            'avatar.max' => 'The avatar file size must not exceed 2MB.',
        ];
    }
}
