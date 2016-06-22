<?php

/*=============================================================================*
 * Languages and Localization Manager
 *=============================================================================*/

class Localization extends Controller
{
    public function setLanguage()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(
            !isset($post['language_code']) || !Session::set('lang', $post['language_code'])
        ){
            echo "Language Set Failed";
            exit();
        }else{
            header('location: '.$post['redirect']);
        }
    }
 
    
    public function getLanguages()
    {
        
    }
    
    
}