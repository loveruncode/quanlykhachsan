<?php

namespace App\Http\Requests;

use App\Enum\Discount;
use App\Enum\RoomStatus;
use Illuminate\Validation\Rules\Enum;

class RoomRequest extends BaseRequest
{


    public function methodPost()
    {
        return [
            'code' => ['required', 'string'],
            'title' => ['required', 'string', 'min:10', 'max:30'],
            'price_selling' => ['required'],
            'total_price' => ['required'],
            'discount' => ['nullable', new Enum(Discount::class)],
            'status' => ['nullable', new Enum(RoomStatus::class)],
            'start_rent' => ['required', 'date'],
            'end_rent' => ['required', 'date'],
            'price_per_date' => ['nullable'],
            

        ];
    }


    public function messages()
    {
        return [

        ];
    }
}
