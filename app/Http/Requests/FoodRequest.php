<?php


namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;



class FoodRequest extends BaseRequest
{



    public function methodPost()
    {
        return [
            'name' => ['required', 'string'],
            'qty' => ['required', 'integer'],
            'eat_time' => ['required'],
            'price' => ['required'],
            'desc' => ['string'],
            'image.*' => ['image', 'max:2048'],
        ];
    }

    public function methodPut()
    {
        return [
            'name' => ['nullable', 'string'],
            'qty' => ['nullable', 'integer'],
            'eat_time' => ['nullable'],
            'price' => ['nullable'],
            'desc' => ['string', 'nullable'],
            'image.*' => ['image', 'max:2048'],
        ];
    }
    public function messages()
    {
        return [
           'name.required' => 'Tên Món Ăn Là Bắt Buộc',
           'qty.required' => 'Số Lượng là bắt buộc',
           'eat_time.required' => 'Vui Lòng Thêm Giờ Ăn',
           'price.required' => 'Vui Lòng Thêm Giá Tiền Món ăn',
        ];
    }
}
