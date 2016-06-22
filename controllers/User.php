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
        $this->includeView('nav/lang_menu', 'footer-content');
        $this->getView('pages/page_default');
        
    }
    
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
        $this->includeView('nav/lang_menu', 'footer-content'); 
        
        // Page View
        $this->getView('pages/page_default');
    }
    
    
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
            $this->includeView('nav/lang_menu', 'footer-content'); 

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
    
    
    public function register($args)
    {
        // Views / Includes
        $this->includeView('user/register', 'main-content');
        $this->index($args);
    }
    
    public function registerProcess($args)
    {
        $this->args = $args;
        $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
    }
    
    
    public function profile()
    {
        echo "Profile";    
    }
    
    
    public function restore()
    {
        echo "Restore";
    }
    
    
}