<?php
class Config
{
    public static $abs_path     = 'D:\xampp\htdocs\arachno';
    public static $web_path     = 'http://localhost/arachno';
    public static $shop_images  = DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'shop'.DIRECTORY_SEPARATOR.'images';
    public static $home_slug 	= 'home';
    public static $db_host 	= 'localhost';
    public static $db_name 	= 'arachno';
    public static $db_user 	= 'root';
    public static $db_pass 	= 'luca1981';
    public static $db_prefix    = 'acms_';
    public static $theme 	= 'default';
    public static $default_lang = 'it-IT';//'en-GB';
    public static $owner_email	= 'user@provider.ext';
    public static $paypal_fee 	= 3.5;
}
