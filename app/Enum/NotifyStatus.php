<?php

namespace App\Enum;

use App\Supports\Enums;


enum NotifyStatus:int
{
    use Enums;
    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            NotifyStatus::Published => 'bg-green',
            NotifyStatus::Draft => 'bg-red',
        };
    }


}
