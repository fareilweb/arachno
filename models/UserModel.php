<?php
class UserModel extends Model
{
    // User Proprerties
    private $user_id                = NULL;
    private $user_reg_date          = NULL;
    private $user_activation        = NULL;
    private $hash_user_activation   = NULL;
    private $user_type              = NULL;
    private $user_name              = NULL;
    private $user_surname           = NULL;
    private $user_email             = NULL;
    private $user_phone             = NULL;
    private $user_mobile_phone      = NULL;
    private $user_password          = NULL;
    
    // Getter Magin Method
    public function __get($property){
        if (property_exists($this, $property)){
            return $this->$property;
        }
    }

    // Setter Magic Method
    public function __set($property, $value){
        if (property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
    
    
    // Load User Data By ID
    public function loadUserById($user_id=NULL)
    {
        if($user_id!==NULL)
        {
            $query = "SELECT * FROM #_users WHERE user_id = $user_id";
            $user_data = $this->getObjectData($query);
            if(!$user_data){
                return FALSE;
            }else{
                $this->user_id              = $user_data->user_id;
                $this->user_reg_date        = $user_data->user_reg_date;
                $this->user_activation      = $user_data->user_activation;
                $this->hash_user_activation = $user_data->hash_user_activation;
                $this->user_type            = $user_data->user_type;
                $this->user_name            = $user_data->user_name;
                $this->user_surname         = $user_data->user_surname;
                $this->user_email           = $user_data->user_email;
                $this->user_phone           = $user_data->user_phone;
                $this->user_mobile_phone    = $user_data->user_mobile_phone;
                $this->user_password        = $user_data->user_password;
            }
        }
    }
    
    
}