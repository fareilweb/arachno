<?php

class Test extends Controller
{
    
    function index()
    {
        echo "It is a test";
    }
    
    function aMethod( $args=array() )
    {
        $this->data = new stdClass;
        $this->page_heading = "aMethod of Test Controller";
        
        // Menu Data and Menu View
        $menu_model = $this->getModel('MenuModel');
        $this->menu_data = $menu_model->selectMenuDataById(1);

        
        // Included Views
        $this->includeView('nav/main_menu', 'content-top');   
        $this->includeView('nav/lang_menu', 'content-bottom');

        
        $this->getView('pages/page_default', $this->data);
    }
    
}