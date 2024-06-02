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
}
