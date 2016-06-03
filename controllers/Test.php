<?php

class Test extends Controller
{
    
    function index()
    {
        echo "It is a test";
    }
    
    function other( $args=array() )
    {
        $this->data = new stdClass;
        
        $this->page_heading = "Test Page";
        
        $this->includeView('nav/main_menu');
        
        $this->getView('pages/page_default', $this->data);
    }
    
}