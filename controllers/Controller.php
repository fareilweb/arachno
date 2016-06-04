<?php

/*=============================================================================*
 * Main Controller of The App. All the created may be extends this one
 *=============================================================================*/

class Controller
{
    // Proprierties
    public $includes = array("positions"=>array());
    public $menus = array();
    
   
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
    
    
    // 
    public function getInclude($position="")
    {
        if( isset($this->includes['positions'][$position]) )
        {
            //echo $this->includes['positions'][$position];
            require_once( $this->includes['positions'][$position] );    
        }
    }
    
    
    public function varDebug($var='')
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }


}
