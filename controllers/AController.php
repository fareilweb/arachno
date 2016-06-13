<?php

class AController extends Controller
{
    
    function index()
    {
        echo "It is a test";
    }
    
    function aMethod( $args=array() )
    {
        // Page Data
        $this->page_heading = "aMethod of Test Controller";
        
        // Main Menu Data
        $menu_model = $this->getModel('MenuModel');
        $this->menus["main_menu"]=$menu_model->selectMenuDataById(1);
        
        // Main Menu View
        $this->includeView('nav/main_menu', 'header-content');   
        
        // Language
        $this->includeView('nav/lang_menu', 'footer-content');    
        
        // Page Default View
        $this->getView('pages/page_default');
    }
    
}