<?php


namespace App\Enum;


use App\Supports\Enums;



enum RoomStatus:int{

    use Enums;
    case Available = 1;
    case Hired = 2;


    public function badge(): string
    {
        return match($this) {
            RoomStatus::Available => 'bg-green',
            RoomStatus::Hired => 'bg-red',
        };
    }

    public static function translate(int $status): string
    {
        return match ($status) {
            RoomStatus::Available->value => __('Phòng Trống'),
            RoomStatus::Hired->value => __('Đã thuê'),
            default => __('Unknown'),
        };
    }


}
