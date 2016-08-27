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
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $user=$this->getModel('UserModel');
        $user->loadUserByEmail($post['user_email']);
        $clear_password = $post['user_password'];
        $stored_hash = $user->user_password;
        $auth = Auth::verifyPassword($clear_password, $stored_hash);
        if($auth===TRUE)
        {   // Utente autenticato
            Session::set("auth", TRUE);
            Session::set("user_data", [
                "user_id"=>$user->user_id,
                "user_reg_date"=>$user->user_reg_date,
                "user_name"=>$user->user_name,
                "user_surname"=>$user->user_surname,
                "user_email"=>$user->user_email,
                "user_phone"=>$user->user_phone,
                "user_mobile_phone"=>$user->user_mobile_phone]);
        }else{
           // Access Denied
           Session::set("auth", FALSE);
           $this->notice = Lang::$access_denied;
        }
        
        if($post['redirect']!=="")
        {
            header('location: ' . Config::$web_path . $post['redirect']);
        }else{
            // Views Includes
            $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
            $this->includeView('nav/main_menu', 'header-content');

            // Page View
            $this->getView('pages/page_default');
        }
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
    
    
    // Register
    public function register($args)
    {
        // Views / Includes
        $this->includeView('user/register', 'main-content');
        $this->index($args);
    }
    
    
    // Register Process
    public function registerProcess($args)
    {
        $this->args = $args;
        $user_model = $this->getModel('UserModel');

        // Check If User Already Exist
        
        $insert_res_id = $user_model->insert($this->post);
        
        if(!$insert_res_id){
            $this->notice = Lang::$insert_fail;
        }else{
            if(!$this->sendActivationEmail($insert_res_id, $this->post['user_password'])){
                $this->error = TRUE;
                $this->notice = Lang::$err_activation_email;
            }else{
                $this->notice = Lang::$insert_success;
                // Spedita email attivazione....
            }
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

            //Create a new PHPMailer instance
            $mail = new PHPMailer;
            // Set PHPMailer to use the sendmail transport
            $mail->isSendmail();
            //Set who the message is to be sent from
            $mail->setFrom(Config::$owner_email, Config::$site_name);
            //Set an alternative reply-to address
            $mail->addReplyTo(Config::$owner_email, Config::$site_name);
            //Set who the message is to be sent to
            $mail->addAddress($user->user_email, $user->user_name . ' ' . $user->user_surname);
            //Set the subject line
            $mail->Subject = Lang::$complete_activation;
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->msgHTML(
                file_get_contents(Config::$abs_path.'/themes/emails/user_activation_'.Lang::$lang_internal_code.'.html'), 
                Config::$abs_path.'/themes/emails/'
            );
            //Replace the plain text body with one created manually
            $mail->AltBody = '';
            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }

            
            return TRUE;
        }
    }
    
    
}