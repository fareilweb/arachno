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
        $this->args = $args;
        
        // Main Menu
        $menu_model = $this->getModel('MenuModel');
        $this->menus["main_menu"]=$menu_model->selectMenuDataById(1);
        $this->includeView('nav/main_menu', 'header-content');
        
        // User Login
        $this->includeView('user/login', 'main-content');
        
        // Language
        $this->includeView('nav/lang_menu', 'footer-content'); 
        
        // Page Default View
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