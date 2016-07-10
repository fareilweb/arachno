<?php

class Upload extends Controller
{
    
    public $allow;
    public $maxSize;
    public $inputName;
    public $fileName;
    public $prefix;
    public $files;
    
    function __construct(){
        parent::__construct();
        $this->files = $_FILES;
    }
    
    function index($args){
        // data
        $this->args = $args;    
    }
    
    public function checkType($mime=NULL){   
        if(in_array($mime, $this->allow)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function checkSize($size=0){
        if($size > $this->maxSize){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public function saveFile($tmp_name=NULL, $target=NULL){
        if (move_uploaded_file($tmp_name, $target)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
     
    
    function itemImagesProcess($args)
    {
        // Args
        $this->args = $args;
        
        // Settings
        $this->allow = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];
        $this->maxSize = 10485760;
        $this->inputName = "images";
        
        // Get Posted Files
        $names = $this->files[$this->inputName]['name'];
        $types = $this->files[$this->inputName]['type'];
        $tmp_names = $this->files[$this->inputName]['tmp_name'];
        $errors = $this->files[$this->inputName]['error']; 
        $sizes = $this->files[$this->inputName]['size'];
        $html = "";
        
        for($i=0; $i<count($names); $i++)
        { 
            $cFile = new stdClass;
            
            $cFile->name     = $names[$i];
            $cFile->type     = $types[$i];
            $cFile->tmp_name = $tmp_names[$i];
            $cFile->error    = $errors[$i];
            $cFile->size     = $sizes[$i];
            $save_target = Config::$abs_path . Config::$shop_images . DIRECTORY_SEPARATOR . $cFile->name;
            $img_src = Config::$web_path . '/views/shop/images/' . $cFile->name;
            
            // Testing File
            if($this->checkType($cFile->type))
            { 
                if($this->checkSize($cFile->size))
                {
                    if($this->saveFile($cFile->tmp_name, $save_target)){
                        
                        $html .= 
                        "<div class=\"col-xs-4 col-sm-3 col-md-2 col-lg-2 imageWrapper\">
                            <img 
                                src=\"$img_src\"
                                alt=\"\" 
                                title=\"\" 
                                data-key=\"<?=$i?>\"
                            />
                        </div>";
                        
                    }else{
                        // Saving ERR
                    }
                }else{
                    // Size ERR
                }
            }else{
                // Type ERR
            }     
        }
        
        echo $html;
         
    }
   
}