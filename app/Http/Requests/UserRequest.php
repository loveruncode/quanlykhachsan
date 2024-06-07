<?php

namespace App\Http\Requests;

use App\Enum\Gender;
use App\Enum\UserRoles;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function methodPost()
    {
        return [
            'name' => ['required', 'min:6', 'max:15'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'gender' => ['nullable', new Enum(Gender::class)],
            'roles' => ['nullable', new Enum(UserRoles::class)],
            'avatar.*' => ['image', 'max:2048'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required_with:password', 'same:password'],

        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'name.min' => 'Tên phải có ít nhất 6 ký tự.',
            'name.max' => 'Tên không được dài quá 15 ký tự.',
            'email.required' => 'Trường email là bắt buộc.',
            'email.email' => 'Email phải là địa chỉ email hợp lệ.',
            'phone.required' => 'Trường số điện thoại là bắt buộc.',
            'phone.regex' => 'Định dạng số điện thoại không hợp lệ.',
            'gender.enum' => 'Giới tính đã chọn không hợp lệ.',
            'roles.enum' => 'Vai trò đã chọn không hợp lệ.',
            'password.required' => 'Trường mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không trùng khớp.',
            'password_confirmation.required_with' => 'Xác nhận mật khẩu là bắt buộc khi mật khẩu được nhập.',
            'password_confirmation.same' => 'Xác nhận mật khẩu phải trùng khớp với mật khẩu.',
        ];
    }
}
