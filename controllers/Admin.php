<?php

/*=============================================================================*
 * Admin Main Controller
 *=============================================================================*/

class Admin extends Controller
{
    
    function __construct()
    {
        // Restrict access to Admin User Only
        if( Session::get('user_data')===FALSE || Session::get('user_data')->user_type !== "admin" )
        {
           header('location: ' . Config::$web_path . '/User/login/redirect/Admin');
        }else{
           // User Logged and Admin. Access Granted
           echo "ciao";
           
        }
    }
    
    function index()
    {    
        $data = new stdClass;
        $this->includeView('user/login');
        $data->includes = $this->getIncludes();
        $this->getView('pages/page_default', $data);
    }
    
    
}