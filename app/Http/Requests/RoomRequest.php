<?php

namespace App\Http\Requests;


class RoomRequest extends BaseRequest
{


    public function methodPost()
    {
        return [
            'code' => ['required', 'string'],
            'title' => ['required', 'string', 'min:10', 'max:30'],
            'price_selling' => []

        ];
    }


    public function messages()
    {
        return [

        ];
    }
}
