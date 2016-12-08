<?php
class UserModel extends Model
{
    
    // Class Proprerties
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
    private $fk_user_lang_id        = NULL;

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

    
    // Insert a New User
    function insert($data=NULL)
    {
        require_once(Config::$abs_path . '/libs/php/Auth.php');
        $lang_id = Lang::$lang_id; // Current Selected Language
        $hash_user_activation = Auth::generateRandomHash();
        $fields = "user_activation, 
                   user_type, 
                   fk_user_lang_id, 
                   hash_user_activation, ";
        $values = "'0', 
                   'registered', 
                   '$lang_id', 
                   '$hash_user_activation', ";
        
        $count = 1;

        foreach($data as $key => $val){
            if(property_exists($this, $key)){
                $count++;

                $this->$key = $val;
                $fields .= "$key ";
                if($key === 'user_password'){
                    $hash = Auth::hashPassword($val);
                    $values .= "'$hash' ";
                }else{
                    $values .= "'$val' ";
                }
                
                if($count < (count($data))){
                    $fields .= ", ";
                    $values .= ", ";
                }
            }
        }

        $query = "INSERT INTO #_users ($fields) VALUES ($values);";
        
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return $this->mysqli->insert_id;
        }
    }

    // Update
    function update()
    {
        $query = "UPDATE #_users SET ";
        
        /*TODO
         foreach((array)$this as $key => $val){
            $query .= "$key = $val";
        }
        */
        
        $query.= "user_activation = $this->user_activation, ";
        $query.= "hash_user_activation = '$this->hash_user_activation', ";
        $query.= "user_type = '$this->user_type', ";
        $query.= "user_name = '$this->user_name', ";
        $query.= "user_surname = '$this->user_surname', ";
        $query.= "user_email = '$this->user_email', ";
        $query.= "user_phone = '$this->user_phone', ";
        $query.= "user_mobile_phone = '$this->user_mobile_phone', ";
        $query.= "user_password = '$this->user_password' ";
        $query.= "WHERE user_id = $this->user_id;";
        
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    // Load User Data By ID ====================================================
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
    
    
    // Load User Data By EMail =================================================
    public function loadUserByEmail($user_email=NULL)
    {
        if($user_email!==NULL)
        {
            $query = "SELECT * FROM #_users WHERE user_email = '$user_email'";
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
                
                return TRUE;
            }
        }
    }
    
    
}