<?php

/*=============================================================================*
 * Main Controller of The App. All the created may be exstends this one
 *=============================================================================*/

class Controller
{
    
    public $includes = [];
    public $modules =[];

    
    public function getModel($model='')
    {
        require_once(Config::$abs_path.'/models/'.$model.'.php');
        return new $model();
    }
    

    public function getView($view='', $data=NULL )
    {
        require_once(Config::$abs_path.'/views/'.$view.'.php');
    }

    
    public function includeView($view="")
    {
        $view_path = Config::$abs_path.'/views/'.$view.'.php';
        array_push($this->includes, $view_path);
    }

    
    public function includeModule($module="", $position="")
    {
        $module_path = Config::$abs_path.'/modules/'.$module.'.php';
        array_push($this->modules, ['position'=>$position, 'path'=>$module_path]);
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
