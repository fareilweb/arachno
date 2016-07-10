<?php

class Upload extends Controller
{
    
    public $allow;
    public $maxSize;
    public $inputName;
    public $savePath;
    public $fileName;
    public $prefix;
    public $files;
    
    function __construct()
    {
        parent::__construct();
        $this->files = $_FILES;
    }
    
    function index($args)
    {
        // data
        $this->args = $args;    
        
    }
       
    function itemImagesProcess($args)
    {
        // Args
        $this->args = $args;
        
        // Settings
        $this->allow = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];
        $this->maxSize = 10485760;
        $this->inputName = "images";
        $this->savePath = Config::$abs_path . '\\views\\shop\\uploads\\';
        
        // Get Files
        $names = $this->files[$this->inputName]['name'];
        $types = $this->files[$this->inputName]['type'];
        $tmp_names = $this->files[$this->inputName]['tmp_name'];
        $errors = $this->files[$this->inputName]['error']; 
        $sizes = $this->files[$this->inputName]['size'];
        
        foreach($names as $key => $img_val)
        {
            
            $types[$key];
            $tmp_names[$key];
            $errors[$key];
            $sizes[$key];
            
            #image_src#
            #image_name#
            #image_title#
            #image_alt#
            #is_main#
            #fk_item_id#
            
            $html = file_get_contents(Config::$abs_path . '\views\admin\shop\item_images\add_image.php');
            $html = str_replace("#image_src#", $replace, $html);
            $html = str_replace("#image_name#", $replace, $html);
            $html = str_replace("#image_title#", $replace, $html);
            $html = str_replace("#image_alt#", $replace, $html);
            $html = str_replace("#is_main#", $replace, $html);
            $html = str_replace("#fk_item_id#", $replace, $html);
            
            echo $html;
        }
        
        //$this->debug($names);
    }
   
}
