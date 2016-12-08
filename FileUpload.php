<?php

class FileUpload
{
   /*===========================================================================
    * Settings
    *===========================================================================*/

    private $allow           = array();  // EX. [ 'image/jpeg', 'image/png', 'image/gif', 'image/bmp' ]
    private $maxSize         = 10485760; // Default is 10485760 (10MB)
    private $inputName       = "file";
    private $savePath        = "C:\\uploads\\";
    private $fileName        = "";       //
    private $prefix          = "";       // EX. -> date("Y_F_d_l_H_i_s", time() ) . "___";
    private $error           = "";

    // Getter/Setter Magic Methods
    public function __get($property){
        if (property_exists($this, $property)){
            return $this->$property;
        }
    }
    public function __set($property, $value){
        if (property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }



   /*===========================================================================
    * Methods
    *===========================================================================*/

    // Do All Controls
    public function checkAll()
    {
        // Make all controls...
        if(!$this->findFile()){
            $this->error = "NO_FILE_SENT";
            return FALSE;
        }else if(!$this->checkType()){
            $this->error = "NOT_ALLOWED_TYPE";
            return FALSE;
        }else if(!$this->checkSize()){
            $this->error = "NOT_ALLOWED_SIZE";
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // Check if there is a file uploaded by the form
    public function findFile()
    {
        if($_FILES && $_FILES["$this->inputName"]["name"]){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    // Check if the file is one of the permitted types
    public function checkType()
    {
        $type = $_FILES["$this->inputName"]["type"];
        if(in_array($type, $this->allowed)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    // Check if the size of the file is right
    public function checkSize()
    {
        if($_FILES["$this->inputName"]["size"] > $this->maxSize){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // Save the file to the target directory (savePath)
    public function saveFile()
    {
        $this->fileName = $_FILES["$this->inputName"]["name"];

        $target_file = $this->savePath . $this->prefix . basename($this->fileName);
                
        if (move_uploaded_file($_FILES["$this->inputName"]["tmp_name"], $target_file)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // Get Final File Name
    public function getFileName()
    {
        return $this->prefix . $this->fileName;
    }

}
