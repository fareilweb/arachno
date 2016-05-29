<?php

class Model extends Database
{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function debug($var='')
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
    
}
