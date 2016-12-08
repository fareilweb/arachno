<?php

class Model extends Database
{

    public $excluded_from_loading = array("excluded_from_loading", "mysqli", "results");

    /* ==============================
        Constructor
     * ============================== */
    public function __construct() {
        parent::__construct();
    }

    /* ========================================
        Getter/Setter Magic Methods
     * ======================================== */
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

    public function loadByObject($object_data=NULL)
    {
        if($object_data!==NULL)
        {
            foreach((array)$object_data as $field_name => $field_value)
            {
                if(!in_array($field_name, $this->excluded_from_loading) && property_exists($this, $field_name))
                {
                    $this->$field_name = $object_data->$field_name;
                }
            }
        }else{
            return FALSE;
        }
        return TRUE;
    }

    public function loadByArray($array_data=NULL)
    {
        if($array_data!==NULL)
        {
            foreach($array_data as $field_name => $field_value)
            {
                if(!in_array($field_name, $this->excluded_from_loading) && property_exists($this, $field_name))
                {
                    $this->$field_name = $array_data[$field_name];
                }
            }
        }else{
            return FALSE;
        }
        return TRUE;
    }


    public function debug($data="")
    {
        echo "<pre><h1>[Debug]</h1><hr/>";
        print_r($data);
        echo "</pre><hr/>";
    }

}
