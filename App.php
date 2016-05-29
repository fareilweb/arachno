<?php
/*=============================================================================*
 * Entry Point Of The App
 *=============================================================================*/

class App
{
    protected $controller = 'Page'; // Default Controller (is possible to override)
    protected $method = 'index';    // Default Method (is possible to ovveride)
    protected $params = [];         // Params container passer by the URL

    public function __construct()
    {
        Session::init();
        
        $url = $this->parseUrl();
        
        if($url)    
        {
            /* IF $url[0] is a controller ======================================*/ 
            if( file_exists(__DIR__ . '/controllers/' . $url[0] . '.php') ) 
            {   
                $this->controller = $url[0];
                unset($url[0]);
                
                require_once(__DIR__ . '/controllers/' . $this->controller . '.php');
                $this->controller = new $this->controller;

                // Method. If $url[0] is a controller AND $url[1] is a method
                if( isset($url[1]) && method_exists($this->controller, $url[1]))
                {
                    $this->method = $url[1];
                    unset($url[1]);
                }

            /* IF $url[0] is NOT a controller | try method of default controller */
            }else{
                
                require_once( __DIR__ . '/controllers/' . $this->controller . '.php');
                $this->controller = new $this->controller;

                // If $url[1] is a method
                if(method_exists($this->controller, $url[0]))
                {   
                    $this->method = $url[0];
                    unset($url[0]);
                }
                
            }

            /* Get and Set params from the remaining $url vars */
            $this->params = $url ? array_values($url) : [];

            /* Call controller and method, and passing the parameters */
            call_user_func_array([$this->controller, $this->method], [$this->params] );

        /* If the $url is EMPTY | Default controller/methods with empty args */
        }else{
            
            require_once(dirname(__FILE__) . '/controllers/' . $this->controller . '.php');
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->method], [$this->params]);
            
        }

    }


    public function parseUrl()
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        
        if(isset($get['url'])){
            return $url = explode('/', filter_var(rtrim($get['url'], '/'), FILTER_SANITIZE_URL) );
        }else{
            return FALSE;
        }
    }

}


