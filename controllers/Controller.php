<?php

/*=============================================================================*
 * Main Controller of The App. All the created may be extends this one
 *=============================================================================*/

class Controller
{
    // Proprierties
    public $includes = array("positions"=>array());
    public $menus = array();
    public $languages = array();
    public $current_url;
    public $post = array();
    public $get = array();
    
    // Constructor
    function __construct()
    {
        $server = filter_input_array(INPUT_SERVER, FILTER_SANITIZE_STRING);
        $this->current_url = "http://" . $server['HTTP_HOST'] . $server['REQUEST_URI'];
        $this->request_uri = $server['REQUEST_URI'];
        $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    }
    
    // Get Model Method
    public function getModel($model='')
    {
        require_once(Config::$abs_path.'/models/'.$model.'.php');
        return new $model();
    }
    

    // Get View Method
    public function getView($view="", $data=NULL )
    {
        require_once(Config::$abs_path.'/views/'.$view.'.php');
    }

    
    // Include a View Method
    public function includeView($view="", $position="")
    {
        $view_path = Config::$abs_path.'/views/'.$view.'.php';
        
        if($position!=""){
            $this->includes['positions'][$position] = $view_path;
        }else{
            array_push($this->includes, $view_path);    
        }
    }
    
    
    // Get Include in a Specific Position
    public function getInclude($position="")
    {
        if( isset($this->includes['positions'][$position]) )
        {
            //echo $this->includes['positions'][$position];
            require_once( $this->includes['positions'][$position] );    
        }
    }
    
    public function debug($debug_data="")
    {
        echo "<pre><h1>[Debug]</h1><hr/>";
        print_r($debug_data);
        echo "</pre><hr/>";
    }
    
    
    

}
