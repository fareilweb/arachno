<?php

class Upload extends Controller
{
    
    function index($args)
    {
        // Dependencies
        require_once(Config::$abs_path . '/libs/php/FileUpload.php');
        
        // data
        $this->args = $args;
        $this->uplaod = new FileUpload();    
        //$this->debug($this);
    }
    
    
    function itemImagesProcess()
    {
        
        
    }
   
}
