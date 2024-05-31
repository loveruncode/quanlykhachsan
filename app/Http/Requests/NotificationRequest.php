<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class NotificationRequest extends BaseRequest
{
    public function methodPost()
    {
        return [
            'title' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'status' => ['required'],
            // 'user_id' => ['required', 'array'],
            // 'user_id.*' => ['required', 'exists:users,id'],
        ];
    }

    public function methodPut()
    {
        return [
            'title' => ['string'],
            'desc' => ['string'],
            'status' => ['required'],
            // 'user_id' => ['nullable', 'array'],
            // 'user_id.*' => ['nullable', 'exists:users,id'],
        ];
    }

}
