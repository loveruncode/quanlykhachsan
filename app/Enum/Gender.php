<?php


namespace App\Enum;


use App\Supports\Enums;


enum Gender :int
{
    use Enums;
    case Male = 1;
    case Female = 2;




    public static function translate(int $status): string
    {
        return match ($status) {
            Gender::Male->value => __('Nam'),
            Gender::Female->value => __('Nữ'),
            default => __('Unknown'),
        };
    }


}
