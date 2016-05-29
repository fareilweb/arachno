<?php

class Auth{

    public static function hashPassword($clear_password) {
        $options = ['cost' => 12, ];
        return password_hash($clear_password, PASSWORD_BCRYPT, $options);
    }

    public static function verifyPassword($clear_password, $stored_hash) {
        return password_verify($clear_password, $stored_hash);
    }

    public static function generateRandomHash(){
        $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
        return $hash;
    }
}
