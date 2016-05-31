<?php

/*=============================================================================*
 * Languages and Localization Manager
 *=============================================================================*/

class Lang extends Controller
{
    
    public function setLanguage()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        if(!Session::set('lang', $post['language_code']))
        {
            echo "Language Set Failed";
        }else{
            header('location: '.$post['redirect']);
        }
        
    }
    
}