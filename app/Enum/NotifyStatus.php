<?php

namespace App\Enum;

use App\Supports\Enums;

enum NotifyStatus:int
{
    use Enums;

    case Published = 1;
    case Draft = 2;

    public function badge(): string
    {
        return match($this) {
            NotifyStatus::Published => 'bg-green',
            NotifyStatus::Draft => 'bg-red',
        };
    }

    public static function translate(int $status): string
    {
        return match ($status) {
            NotifyStatus::Published->value => __('Đã Xuất Bản'),
            NotifyStatus::Draft->value => __('Chưa Xuất Bản'),
            default => __('Unknown'),
        };
    }

}
