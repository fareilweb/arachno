<?php
/**
 *
 */
class Module extends Controller
{
    public $view        = "main";         // current view file name, must be inside "<module_name>/views"
    public $position    = "main-content"; // the position where load the module view output
    public $module_name = "";
    public $module_url  = "";

    function __construct(){
        $this->initModule();
    }

    // Initialize the Module
    function initModule(){
        $args = $this->parseUrl();  // get args from url
        $this->callAction($args);   // call the right action
    }

    // Call Action By Parameters
    function callAction($args=NULL)
    {
        // get the method name from "$args"
        // !!! Default for front end is stored in 1 index(not backend)
        if(isset($args[1]))
        {
            $method = $args[1];
            // check if the method exist then call it
            if(method_exists($this, $method)){
                $this->$method( $args );
            }
        }else{
            $this->main($args);
        }
    }

    function main($args=array()){ }
}
