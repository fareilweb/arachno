<?php

class User extends Controller
{
    
    public function index($args)
    {
        $this->args = $args;
        
        // Meniu Data
        $menu_model = $this->getModel('MenuModel');
        $this->menus["main_menu"]=$menu_model->selectMenuDataById(1);
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->getView('pages/page_default');
    }
    
    
    // Login Page
    public function login($args)
    {
        // Get Argouments
        $this->args = $args;
        
        // Get Needed Data
        $menu_model = $this->getModel('MenuModel');
        $this->menus["main_menu"] = $menu_model->selectMenuDataById(1);
        
        // Views Includes
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('user/login', 'main-content');        
        
        // Page View
        $this->getView('pages/page_default');
    }
    
    
    // Login Process
    public function loginProcess($args)
    {
        // Dependencies
        require_once(Config::$abs_path.'/libs/php/Auth.php');
        
        // Argouments
        $this->args = $args;
        
        // Elaborate Login
        $user=$this->getModel('UserModel');
        $user->loadUserByEmail($this->post['user_email']);
        
        $clear_password = $this->post['user_password'];
        $stored_hash = $user->user_password;
        $auth = Auth::verifyPassword($clear_password, $stored_hash);
        
        if($auth===TRUE)
        {   
            if($user->user_activation)
            {
                // Utente autenticato
                Session::set("auth", TRUE);
                Session::set("user_data", [
                    "user_id"=>$user->user_id,
                    "user_reg_date"=>$user->user_reg_date,
                    "user_name"=>$user->user_name,
                    "user_surname"=>$user->user_surname,
                    "user_email"=>$user->user_email,
                    "user_phone"=>$user->user_phone,
                    "user_mobile_phone"=>$user->user_mobile_phone
                    ]
                );
                
                if($this->post['redirect']!==""){
                    header('location: ' . Config::$web_path . $this->post['redirect']);
                }
                
            }else{
                $this->notice = Lang::$account_still_not_active;
                $this->notice .= '<br/>' . Lang::$check_email_to_complete_activation ;
            }
            
        }else{
           // Access Denied
           Session::set("auth", FALSE);
           $this->notice = Lang::$access_denied;
        }
        
        $this->index($args);
    }
    
    
    public function logout($args)
    {
        Session::set('auth', FALSE);
        if(Session::get('auth')!==TRUE){
            $this->notice = Lang::$goodbye;
        }else{
            $this->notice = Lang::$err_logout;
        }
        $this->index($args);
    }
    
    
    // Activation
    public function activate($args=NULL)
    {
        $this->args = $args;
        if($args!==NULL){
            $this->user = $this->getModel('UserModel');
            $this->user->loadUserById($args[0]);
            
            if($this->user->hash_user_activation === $args[1]){
                $this->user->user_activation = 1;
                if(!$this->user->update()){
                    $this->error = TRUE;
                    $this->notice = Lang::$activation_failed;
                }else{
                    $this->notice = Lang::$activation_success;
                }
            }else{
                $this->error = TRUE;
                $this->notice = Lang::$activation_failed;
            }
        }
        $this->index($args);
    }
    
    
    // Register
    public function register($args)
    {
        $this->args = $args;
        
        // Views / Includes
        $this->includeView('user/register', 'main-content');
        $this->index($args);
    }
    
    
    // Register Process
    public function registerProcess($args)
    {
        $this->args = $args;
        $user_model = $this->getModel('UserModel');
        
        //$res = $user_model->loadUserByEmail($this->post['user_email']);
        //var_dump($res);
        //exit;
        
        // Check If User Already Exist
        if(!$user_model->loadUserByEmail($this->post['user_email']))
        {
            $insert_res_id = $user_model->insert($this->post);
            if(!$insert_res_id){
                $this->notice = Lang::$insert_fail;
            }else{
                if(!$this->sendActivationEmail($insert_res_id, $this->post['user_password'])){
                    $this->error = TRUE;
                    $this->notice = Lang::$err_activation_email . ' ' . Config::$site_name;
                }else{
                    $this->notice = Lang::$insert_success . "<br/>" . Lang::$check_email_to_complete_activation;
                }
            }
            
        }else{
            $this->warning = TRUE;
            $this->notice = Lang::$user_already_registered;
        }
        
        $this->index($args);
    }
    
    
    public function profile()
    {
        echo "Profile";    
    }
    
    
    public function restore()
    {
        echo "Restore";
    }
    
    
    public function sendActivationEmail($user_id=NULL, $clear_password=NULL)
    {
        if($user_id!==NULL && $clear_password!==NULL){
            
            require_once(Config::$abs_path. '/libs/php/PHPMailer/PHPMailerAutoload.php');
            $user = $this->getModel('UserModel');
            $user->loadUserById($user_id);
            
            $activation_url = Config::$web_path . "/User/activate/$user->user_id/" . $user->hash_user_activation;
            
            // Load/Edit Email Template
            $html_body = file_get_contents(Config::$abs_path.'/themes/emails/user_activation_'.Lang::$lang_internal_code.'.html');
            $html_body = str_replace('#user_name#', $user->user_name, $html_body);
            $html_body = str_replace('#user_email#', $user->user_email, $html_body);
            $html_body = str_replace('#user_password#', $clear_password, $html_body);
            $html_body = str_replace('#activation_url#', $activation_url, $html_body);
            
            $mail = new PHPMailer;
            $mail->isSendmail();
            $mail->setFrom(Config::$owner_email, Config::$site_name);
            $mail->addReplyTo(Config::$owner_email, Config::$site_name);
            $mail->addAddress($user->user_email, $user->user_name . ' ' . $user->user_surname);
            $mail->Subject = Lang::$activation_email_subject;
            $mail->msgHTML($html_body, Config::$abs_path.'/themes/emails/');
            $mail->AltBody = '';
            if (!$mail->send()) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }
    
    
}