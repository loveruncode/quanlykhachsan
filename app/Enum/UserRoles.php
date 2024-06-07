<?php


namespace App\Enum;


use App\Supports\Enums;


enum UserRoles :int
{
    use Enums;
    case Admin = 1;
    case Member = 2;

    public function badge(){
        return match($this) {
            UserRoles::Admin => 'bg-green',
            UserRoles::Member => 'bg-red',
        };
    }



    public static function translate(int $status): string
    {
        return match ($status) {
            UserRoles::Admin->value => __('Quản Trị Viên'),
            UserRoles::Member->value => __('Khách Hàng'),   
        };
    }


}
