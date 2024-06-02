<?php



namespace App\Enum;

use App\Supports\Enums;

enum PostStatus:int
{
    use Enums;

    case Published = 1;
    case Draft = 2;

    public function badge(): string
    {
        return match($this) {
            PostStatus::Published => 'bg-green',
            PostStatus::Draft => 'bg-red',
        };
    }

    public static function translate(int $status): string
    {
        return match ($status) {
            PostStatus::Published->value => __('Đã Xuất Bản'),
            PostStatus::Draft->value => __('Chưa Xuất Bản'),
            default => __('Unknown'),
        };
    }

}
