<?php

/*=============================================================================*
 * Admin Main Controller
 *=============================================================================*/

class Admin extends Controller
{
    
    function __construct() {
        // Restrict access to Admin User Only
        if( Session::get('user_data')===FALSE || Session::get('user_data')->user_type !== "admin" )
        {
           // User Logged and Admin
           
            
        }else{
            // Access Denied
            echo "";
        }
    }
    
    function index()
    {
        $data = new stdClass;
        
        // Included Views
        $this->includeView('admin/dashboard');
        
        $data->includes = $this->getIncludes();
        $this->getView('pages/page_default', $data);
    }
    
}