<?php
namespace App\Helpers;



class DateHelper
{
    public static function formatDate($date, $format = 'd-m-Y')
    {
        return date($format, strtotime($date));
    }
}
