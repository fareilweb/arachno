<?php

class Upload extends Controller
{
    
    public $allow = array('image/jpeg', 'image/png', 'image/gif', 'image/bmp');
    public $maxSize = 10485760;
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
    
    public function storeItemImage($file_name, $image_path, $image_src, $fk_item_id)
    {
        $img_mod = $this->getModel('ShopImageModel');
        $img_mod->image_src = $image_src;
        $img_mod->image_path = $image_path;
        $img_mod->image_name = $file_name;
        $img_mod->image_title = "";
        $img_mod->image_alt = "";
        $img_mod->is_main = 0;
        $img_mod->fk_item_id = $fk_item_id;
        $insert_res = $img_mod->insert();
        if(!$insert_res){
            return FALSE;
        }else{
            return $insert_res;
        }
    }
    
    
    public function saveFile($tmp_name=NULL, $target=NULL){
        if (move_uploaded_file($tmp_name, $target)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    public function deleteFile($file=NULL)
    {
        if($file!==NULL){
            if (!unlink($file)){
              return FALSE;
            }else{
              return TRUE;
            }
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
        
        if(isset($this->files[$this->inputName]) && count($this->files[$this->inputName])>0)
        {
            // Get Posted Files
            $names = $this->files[$this->inputName]['name'];
            $types = $this->files[$this->inputName]['type'];
            $tmp_names = $this->files[$this->inputName]['tmp_name'];
            $errors = $this->files[$this->inputName]['error']; 
            $sizes = $this->files[$this->inputName]['size'];
            
            for($i=0; $i<count($names); $i++)
            { 
                $cFile = new stdClass;
                $cFile->name     = date("Y_F_d_l_H_i_s", time() ) ."___". $names[$i];
                $cFile->type     = $types[$i];
                $cFile->tmp_name = $tmp_names[$i];
                $cFile->error    = $errors[$i];
                $cFile->size     = $sizes[$i];
                $save_target     = Config::$abs_path . "/views/images/shop/items/" . $cFile->name;
                $image_src       = Config::$web_path . '/views/images/shop/items/' . $cFile->name;
                $fk_item_id = $this->args[0];
                
                // Testing File
                if($this->checkType($cFile->type))
                { 
                    if($this->checkSize($cFile->size))
                    {
                        $save_res  = $this->saveFile($cFile->tmp_name, $save_target);
                        $store_res = $this->storeItemImage($cFile->name, $save_target, $image_src, $fk_item_id);
                        if($save_res && $store_res)
                        {
                            ?> 
                            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 text-center preview_image_wrapper" id="index<?=$i?>">
                                <p>
                                    <button class="btn btn-default btn-primary add"
                                        data-index="<?=$i?>" 
                                        data-src="<?=$image_src?>" 
                                        data-image_id="<?=$store_res?>" 
                                        data-fk_item_id="<?=$fk_item_id?>"
                                    ><span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button class="btn btn-default btn-danger rem"
                                        data-index="<?=$i?>" 
                                        data-src="<?=$image_src?>" 
                                        data-image_id="<?=$store_res?>" 
                                        data-fk_item_id="<?=$fk_item_id?>"
                                    ><span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </p>
                                <p><img src="<?=$image_src?>" alt="<?=Lang::$preview?>" title="<?=Lang::$preview?>" /></p>
                            </div>
                            <?php
                        }else{
                            // Saving ERR
                        }
                    }else{
                        // Size ERR
                    }
                }else{
                    // Type ERR
                }
            } // for() END
            
        }
    }
   
}