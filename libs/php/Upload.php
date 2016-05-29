<?php

class Upload 
{
    /* -------------------------------------------
    * Settings 
    * ---------------------------------------- */
    
    public $savePath        = '';
    public $fileName        = '';
    public $prefix          = '';       // EX. -> date("Y_F_d_l_H_i_s", time() ) . "___";
    public $maxSize         = 10485760; // Default is 10485760 (10MB)
    public $permittedTypes  = [];       // EX. [ 'image/jpeg', 'image/png', 'image/gif', 'image/bmp' ]
    
    
    
    /* -------------------------------------------
    * Functions ----------------------------------
    * ----------------------------------------- */
    
    // Do All Controls
    public function checkAll()
    {
        // Make all controls...
        if(!$this->findFile()){
            return "NO_FILE";
        }else if(!$this->checkType()){
            return "NO_TYPE";
        }else if(!$this->checkSize()){
            return "NO_SIZE";
        }else if($this->saveFile($this->prefix)){
            return TRUE;
        }
    }
    
    
    
    // Check if there is a file uploaded by the form
    public function findFile()
    {
        if($_FILES && $_FILES["file"]["name"]){ 
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    
    
    // Check if the file is one of the permitted types
    public function checkType()
    {   
        $type = $_FILES["afile"]["type"];
        $res = 0;
        
        foreach ($this->permittedTypes as $value){
            if($type != $value){
                $res = 0;
            }else{
                $res = 1;
            }
        }
        
        return $res;
        
    }
    
    
    
    // Check if the size of the file is right
    public function checkSize()
    {
        if($_FILES["afile"]["size"] > $this->maxSize){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    
    
    // Save the file to the target directory (savePath)
    public function saveFile()
    {   
        $target_file = $this->savePath . $this->prefix . basename($_FILES["afile"]["name"]);
      
        if (move_uploaded_file($_FILES["afile"]["tmp_name"], $target_file)) {
            $this->fileName =  basename($_FILES["afile"]["name"]);
        } else {
            return FALSE;
        }
    }
    
    
    
    public function getFileName()
    {
        return $this->prefix . $this->fileName;
    }
   
}





    
        
    
        
        
   