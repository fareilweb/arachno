<?php

class TimeManager
{
    function __construct()
    {
        date_default_timezone_set('Europe/Rome');
    }

    function getCurrentDateTime()
    {
        $date = new DateTime('now');
        $date = $date->format('y-m-d h:i:s');
        return $date;
    }

    function getCurrentUnixTime()
    {
        return time();
    }

    function unixTimeToString($unix_time)
    {
        return strftime('%d-%m-%Y %H:%M:%S', $unix_time);
    }

    function stringToUnixTime($time_string)
    {
        return strtotime($time_string);
    }

    function addMonths($time_string, $months_to_add)
    {
        return strtotime($time_string . '+' . $months_to_add . 'months');
    }

    function diffBetweenTimes($time_1, $time_2)
    {
        $time_1 = new DateTime($time_1);
        $time_2 = new DateTime($time_2);
        $difference = $time_1->diff($time_2);
        return $difference;
    }

}



