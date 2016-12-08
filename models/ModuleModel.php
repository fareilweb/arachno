<?php
/**
 *
 */
class ModuleModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getModules()
    {
        $dir = Config::$abs_path. "/modules/";
        $modules = array();
        if (is_dir($dir)) {
          if ($dh = opendir($dir)) {
              while (($file = readdir($dh)) !== false) {
                  if(is_dir($dir . $file) && $file !== "." && $file !== ".."){
                      array_push($modules, $file);
                  }
              }
              closedir($dh);
            }
        }

        return $modules;
    }

}
