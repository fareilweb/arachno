<?php

class User extends Controller
{
    
    public function index()
    {
        // Default
        $this->login();
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
        
        // Get Needed Data
        $menu_model = $this->getModel('MenuModel');
        $this->menus["main_menu"] = $menu_model->selectMenuDataById(1);
        
        // Elaborate Login
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $user=$this->getModel('UserModel');
        $user->loadUserById(1);
        $clear_password = $post['user_password'];
        $stored_hash = $user->user_password;
        $auth = Auth::verifyPassword($clear_password, $stored_hash);
        
        if($auth===TRUE){
            echo "Password corretta";
        }else{
            echo "Password errata";
        }
        
        // Views Includes
        $this->includeView('nav/main_menu', 'header-content');   
        $this->includeView('nav/lang_menu', 'footer-content'); 
        
        // Page View
        $this->getView('pages/page_default');
    }
    
    
    public function register()
    {
        // Main Menu
        $menu_model = $this->getModel('MenuModel');
        $this->menus["main_menu"]=$menu_model->selectMenuDataById(1);
        $this->includeView('nav/main_menu', 'header-content');
        
        // User Register
        $this->includeView('user/register', 'main-content');
        
        // Language
        $this->includeView('nav/lang_menu', 'footer-content');
        
        // Page Default View
        $this->getView('pages/page_default');
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