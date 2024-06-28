<?php


namespace App\Http\Requests;

use App\Enum\NotifyStatus;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;

class PostRequest extends BaseRequest
{

    public function methodPost()
    {
        return [
            'title' => ['required', 'string'],
            'status' =>['nullable', new Enum(NotifyStatus::class)],
            'desc' => ['string', 'required'],
            'image.*' => ['image', 'max:2048'],
            'user_id' => ['nullable'],
        ];
    }

    public function methodPut()
    {
        return [];
    }


    public function messages()
    {
        switch ($this->method()) {
            case 'POST':
                return [

                ];
            case 'PUT':
                return [

                ];
            default:
                return [];
        }
    }
}
