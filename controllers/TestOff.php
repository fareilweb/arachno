<?php

class Test extends Controller
{
    
    function index()
    {
        echo "It is a test";
    }
    
    function other($args=[])
    {
        $data = new stdClass;
        $data->page_heading = "Titolo pagina";
        
        
        
        $this->getView('pages/page_view', $data);
    }
    
}