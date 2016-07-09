<?php

class Upload extends Controller
{
    function index($args)
    {
        // data
        $this->args = $args;    
        //$this->debug($this);
    }
       
    function itemImagesProcess($args)
    {
        $this->args = $args;

        require_once(Config::$abs_path . '/libs/php/FileUpload.php');
        $upl = new FileUpload();
        $upl->allow = [ 'image/jpeg', 'image/png', 'image/gif', 'image/bmp' ];
        $upl->maxSize = 10485760;
        $upl->inputName = "file";
        $upl->savePath = Config::$abs_path . '\\views\\shop\\uploads\\';
        $upl->fileName = "";
        $upl->prefix = "";


        $this->debug($upl);
    }
   
}
