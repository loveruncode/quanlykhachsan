<?php

namespace App\Http\Requests;

use App\Models\Room;
use App\Enum\Discount;
use App\Enum\RatingScore;
use App\Enum\RoomStatus;
use App\Enum\TypeRoom;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;


class RoomRequest extends BaseRequest
{


    public function methodPost()
    {
        return [
            'code' => ['required', 'string', function ($attribute, $value, $fail) {
                if (Room::where('code', $value)->exists()) {
                    $fail('Đã có mã Phòng này rồi');
                }
            }],
            'title' => ['required', 'string',],
            'price_selling' => ['nullable', 'required'],
            'total_price' => ['nullable'],
            'discount' => ['nullable', new Enum(Discount::class)],
            'status' => ['nullable', new Enum(RoomStatus::class)],
            'start_rent' => ['required', 'date'],
            'end_rent' => ['required', 'date'],
            'price_per_date' => ['nullable'],
            'floor' => ['nullable',],
            'type' => ['nullable', new Enum(TypeRoom::class)],
            'rating' => ['nullable', new Enum(RatingScore::class)],
            'area' => ['required', 'integer'],
            'desc' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'pic.*' => ['image', 'max:2048'],
        ];
    }

    public function methodPut()
    {
        return [
            'code' => ['required','string'],
            'title' => ['required', 'string',],
            'price_selling' => ['nullable', 'required'],
            'total_price' => ['nullable'],
            'discount' => ['nullable', new Enum(Discount::class)],
            'status' => ['nullable', new Enum(RoomStatus::class)],
            'start_rent' => ['required', 'date'],
            'end_rent' => ['required', 'date'],
            'price_per_date' => ['nullable'],
            'floor' => ['nullable',],
            'type' => ['nullable', new Enum(TypeRoom::class)],
            'rating' => ['nullable', new Enum(RatingScore::class)],
            'area' => ['required'],
            'desc' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'pic.*' => ['image', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Mã phòng là bắt buộc.',
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
            'price_selling.required' => 'Giá bán là bắt buộc.',
            'total_price.required' => 'Tổng giá là bắt buộc.',
            'start_rent.required' => 'Ngày bắt đầu thuê là bắt buộc.',
            'start_rent.date' => 'Ngày bắt đầu thuê phải là một ngày hợp lệ.',
            'end_rent.required' => 'Ngày kết thúc thuê là bắt buộc.',
            'end_rent.date' => 'Ngày kết thúc thuê phải là một ngày hợp lệ.',
            'floor.required' => 'Số tầng là bắt buộc.',
            'floor.integer' => 'Số tầng phải là một số nguyên.',
            'area.required' => 'Diện tích là bắt buộc.',
            'desc.required' => 'Mô tả là bắt buộc.',
        ];
    }
}
