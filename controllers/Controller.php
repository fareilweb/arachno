<?php

/*=============================================================================*
 * Main Controller of The App. All the created may be extends this one
 *=============================================================================*/

class Controller
{
    
    public $includes = [];
    
    public function __construct()
    {
        $this->includes['positions'] = [];
    }
    
    public function getModel($model='')
    {
        require_once(Config::$abs_path.'/models/'.$model.'.php');
        return new $model();
    }
    

    public function getView($view='', $data=NULL )
    {
        require_once(Config::$abs_path.'/views/'.$view.'.php');
    }

    
    public function includeView($view="", $position="")
    {
        $view_path = Config::$abs_path.'/views/'.$view.'.php';
        if($position!=""){
            $this->includes['positions'][$position] = $view_path;
        }else{
            array_push($this->includes, $view_path);    
        }
    }
    
    
    public function getIncluded($position="")
    {
        require_once($this->includes['positions'][$position]);
    }
    
    
    public function getIncludes()
    {
        return $this->includes;
    }

    
    public function varDebug($var='')
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }


}
