<?php


namespace App\Enum;

use App\Supports\Enums;


enum TypeRoom:int{


    use Enums;


    case Vip = 1;
    case Normal = 2;

    public function badge(){
        return match($this) {
            TypeRoom::Vip => 'bg-green',
            TypeRoom::Normal => 'bg-red',
        };
    }



    public static function translate(int $status): string
    {
        return match ($status) {
            TypeRoom::Vip->value => __('Phòng Vip'),
            TypeRoom::Normal->value => __('Phòng Thường'),
            default => __('Unknown'),
        };
    }

}
