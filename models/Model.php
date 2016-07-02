<?php

class Model extends Database
{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function debug($data="")
    {
        echo "<pre><h1>[Debug]</h1><hr/>";
        print_r($data);
        echo "</pre><hr/>";
    }
    
}
