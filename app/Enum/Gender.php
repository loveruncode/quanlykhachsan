<?php


namespace App\Enum;


use App\Supports\Enums;


enum Gender :int
{
    use Enums;
    case Male = 1;
    case Female = 2;

   


}
