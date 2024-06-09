<?php



namespace App\Enum;
use App\Supports\Enums;
enum Discount: int
{
     use Enums;
    case NoDiscount = 0;
    case Level1 = 10;
    case Level2 = 15;
    case Level3 = 20;
    case Level4 = 25;
    case Level5 = 30;
    case Level6 = 35;
    case Level7 = 50;



    public static function translate(int $status): string
    {
        return match ($status) {
            self::NoDiscount->value => 'No Discount',
            self::Level1->value => '10%',
            self::Level2->value => '15%',
            self::Level3->value => '20%',
            self::Level4->value => '25%',
            self::Level5->value => '30%',
            self::Level6->value => '35%',
            self::Level7->value => '50%',
            default => 'Unknown',
        };
    }
}
