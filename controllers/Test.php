<?php

class Test extends Controller
{
    
    function index()
    {
        echo "It is a test";
    }
    
    function other( $args=array() )
    {
        $data = new stdClass;
        
        $this->getView('pages/page_default', $data);
    }
    
}