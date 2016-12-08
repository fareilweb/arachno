<?php
/*
 *  Manage The Session 
 * */

class Session 
{   
    
    // Handle The Current State of Session
    private static $SessionStarted = FALSE;
    
    
    // Initialize The Session
    public static function init() {
        if( self::$SessionStarted == FALSE ) {
            if(session_start()) {
            	self::$SessionStarted = TRUE;	
            }else{
            	return FALSE;	
            }
        }
    }
	
	
    // Get All the session array
    public static function getSession()
    {
        if(self::$SessionStarted = TRUE){
                return $_SESSION;	
        }else{
                return FALSE;		
        }
    }
    
    
    // Set a Variable
    public static function set($key, $value)
    {
        if($_SESSION[$key] = $value){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    
    // Get a Variable
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        {
            return $_SESSION[$key]; 
        }else{
            return FALSE;
        }
        
    }
    
    
    // Delete (overwrite with NULL) a Session Variable
    public static function delete($key)
    {
		unset($_SESSION[$key]);
		
		if( !isset($_SESSION[$key]) ){
    		return TRUE;
        }else{
        	return FALSE;
        }
    }
    
    
    // Destroy the Entire Session
    public static function destroy() 
    {
        if(self::$SessionStarted == true)
        {
            if(session_unset() AND session_destroy()){
            	self::$SessionStarted = false;
				return TRUE;	
            }else{
            	return FALSE;
            }
        }
    }
    
}