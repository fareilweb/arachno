<?php

/*=============================================================================*
 * Admin Main Controller
 *=============================================================================*/

class Admin extends Controller
{
    
    function __construct()
    {   // Auth And Privilege Check
        if(empty(Session::get('auth')) || !Session::get('auth')){
            // redirect to login or exit
           if(!header('location: ' . Config::$web_path . '/User/login/redirect/Admin')){
               exit();
           }
        }else{
            // User Logged
            $user = $this->getModel('UserModel');
            $user->loadUserById( Session::get('user_data')['user_id'] );
            // If User iS not Admin exit
            if($user->user_type!=="admin"){
                echo Lang::$access_denied;
                exit();
            }
        }
    }
    
    function index()
    {    
        $data = new stdClass;
        $this->includeView('user/login');
        
        // Views Includes
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('nav/lang_menu', 'footer-content'); 
        
        //
        $this->getView('pages/page_default', $data);
    }
    
    
    
    
}