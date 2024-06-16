<?php



namespace App\Enum;

use App\Supports\Enums;


enum RatingScore: int
{
    use Enums;


    case VeryBad = 1;
    case Bad = 2;
    case Okay = 3;
    case Good = 4;
    case Excellent = 5;



    public static function translate(int $status):string
    {
        return match ($status) {
            RatingScore::VeryBad->value => __('Rất Tệ'),
            RatingScore::Bad->value => __('Tệ'),
            RatingScore::Okay->value => __('Ổn'),
            RatingScore::Good->value => __('Tốt'),
            RatingScore::Excellent->value => __('Rất Tốt'),
            default => __('Unknown'),
        };
    }

}
