<?php

/*=============================================================================*
 * Main Controller of The App. All the created may be extends this one
 *=============================================================================*/

class Controller
{

    // Constructor
    function __construct(){
        $this->initialize();
    }

    // Init Function
    private function initialize()
    {
        // Properties
        $this->includes = array("positions"=>array());
        $this->languages = array();
        $this->current_url = NULL;
        $this->user = NULL;

        // Current State/Position
        $this->controller_name = get_class($this);
        $this->current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->request_uri = $_SERVER['REQUEST_URI'];

        // Inputs Grab
        $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $this->raw_post = $_POST;
        $this->raw_get = $_GET;

        // User
        if(Session::get('auth')){
          $this->user = Session::get('user_data');
        }

        // Menus
        $menu_model = $this->getModel("MenuModel"); // Get Menu Model
        $this->menus = $menu_model->getAllMenus(); // Get All Menus

        // Localization
        $localization_model = $this->getModel("LocalizationModel");
        $this->languages = $localization_model->getLanguages();

        // Get and Instantiate ModuleModel (it load list from modules folder)
        $module_model = $this->getModel("ModuleModel");
        $this->available_modules = $module_model->getModules();

        // Debug
        if(Config::$debug == TRUE){
            $this->debug($this);
        }

    }

    // Parse the Current Url Store Data into "$args" Array
    public function parseUrl()
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        if(isset($get['url'])){
            $args = explode('/', rtrim($get['url'], '/') );
            return $args;
        }else{
            return FALSE;
        }
    }

    // Get Model Method
    public function getModel($model_name="")
    {
        require_once(Config::$abs_path.'/models/'.$model_name.'.php');
        return new $model_name();
    }


    // Get View Method
    public function getView($view=NULL, $data=NULL)
    {
        if($view===NULL){
            $view = Config::$default_view;
        }

        if(file_exists(Config::$abs_path.'/themes/'.Config::$theme.'/views/'.$view.'.php')){
            // Use Theme Override Of The View
            require_once Config::$abs_path.'/themes/'.Config::$theme.'/views/'.$view.'.php';
        }else{
            // Use Default App View
            if(file_exists(Config::$abs_path.'/views/'.$view.'.php')){
                require_once Config::$abs_path.'/views/'.$view.'.php';
            }else{
                require_once Config::$abs_path.'/views/'.Config::$default_view.'.php';
            }
        }
    }

    // Include and Load a Module with its View
    public function loadModule($mod_name=NULL)
    {
        if($mod_name!== NULL)
        {
            $mod_class = ucfirst($mod_name);
            $mod_path = Config::$abs_path.'/modules/'.$mod_name;
            $mod_file = $mod_path.'/'.$mod_class.'.php';

            if(file_exists($mod_file))
            {
                // Include The Module Class
                include_once $mod_file;

                // Create an Instance of The Module Class
                $this->$mod_name = new $mod_class();

                /* Load The Current Module View in the Current Module Position */

                // Concatenate Theme Override View Absolute Path
                $theme_view_abs_path = Config::$abs_path
                                      . '/themes/'
                                      . Config::$theme
                                      . '/views/modules/'
                                      . $mod_name . '/'
                                      . $this->$mod_name->view
                                      . '.php';

                // Concatenate Module View Absolute Path
                $mod_view_abs_path = Config::$abs_path
                                      . '/modules/'
                                      . $mod_name
                                      . '/views/'
                                      . $this->$mod_name->view
                                      . '.php';

               if( file_exists($theme_view_abs_path) ){
                    // Check First If There is a Theme Override of The view
                    $view_abs_path = $theme_view_abs_path;
                }else if($mod_view_abs_path){
                    // Search for The Module Default Version
                    $view_abs_path = $mod_view_abs_path;
                }else{
                    // Use The Module Default View
                    $view_abs_path = $mod_path . '/views/' . Config::$module_default_view . '.php';
                }

                $this->includeView(
                  $view_abs_path,
                  $this->$mod_name->position,
                  TRUE
                );
            }
        }
    }

    // Include View Method
    public function includeView($view="", $position="", $absolute=FALSE)
    {
        if($absolute==TRUE && file_exists($view))
        {   // The "$view" parameter is the absolute path of the view
            $view_path = $view;
        }else{
            if(file_exists(Config::$abs_path.'/themes/'.Config::$theme.'/views/'.$view.'.php')){
                // Look to the Theme for an Override Of The View
                $view_path = Config::$abs_path.'/themes/'.Config::$theme.'/views/'.$view.'.php';
            }else{
                // Use Defaul App View
                $view_path = Config::$abs_path.'/views/'.$view.'.php';
            }
        }

        if($position!=""){
            $this->includes['positions'][$position] = $view_path;
        }else{
            array_push($this->includes, $view_path);
        }
    }

    // Get Include in a Specific Position
    public function getPosition($position="")
    {
        // Insert View To Position
        if(isset($this->includes['positions'][$position])){
            include( $this->includes['positions'][$position] );
        }
    }

    // Redirect To A Url
    public function redirect($url="", $external=FALSE)
    {
        if($external===TRUE){
            $final_url = $url;
        }else{
            $final_url = Config::$web_path . $url;
        }
        header("location: $final_url");
    }





    /* ====================================
        Debug Methods
     * ==================================== */
    public function debug($debug_data="")
    {
        // Save print_r to a variable
        ob_start();
        print_r($debug_data);
        $this->print_r = ob_get_clean();

        $this->includeView('debug/debug_form', 'debug');
    }

    public function print_ri($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }


}
