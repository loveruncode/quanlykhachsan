<?php

namespace App\Helpers;



class Helper
{
    public static function formatDate($date, $format = 'd-m-Y')
    {
        return date($format, strtotime($date));
    }
    public static function formatNumber($number)
    {
        return number_format($number, 0, ',', '.');
    }

    public static function parseAddress($address)
    {
        $parts = explode(', ', $address);

        if (count($parts) >= 4) {
            return "Đường {$parts[0]}/ Phường {$parts[1]}/ Quận {$parts[2]}/ Thành Phố {$parts[3]}";
        } else {
            return "Không đủ thông tin địa chỉ";
        }
    }

}
