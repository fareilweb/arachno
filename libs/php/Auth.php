<?php

class Auth
{
    private static $salt = '$1$rasmusle$';

    public static function hashPassword($clear_password)
    {

        if(function_exists("password_hash") && FALSE ) // PHP 5 >= 5.5.0
        {
            $options = ['cost' => 12, ];
            return password_hash($clear_password, PASSWORD_BCRYPT, $options);
        }else{ // < 5.5.0

            return crypt($clear_password, self::$salt);
        }
    }


    public static function verifyPassword($clear_password, $stored_hash)
    {
        if (function_exists("password_verify")) // PHP 5 >= 5.5.0
        {
            return password_verify($clear_password, $stored_hash);
        }else{ // < 5.5.0

            //echo "STORED: " . $stored_hash . "<br>";
            //echo "HASHED: " . crypt($clear_password, $salt) . "<br>";
            //var_dump($stored_hash == crypt($clear_password, $salt));
            //exit;

            return ($stored_hash == crypt($clear_password, self::$salt));
            
        }
    }


    public static function generateRandomHash(){
        $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
        return $hash;
    }

}
