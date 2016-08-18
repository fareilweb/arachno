<?php
/*==============================================================================*
 * Uncomment for debug: 
 *==============================================================================*/
ini_set('display_errors', TRUE);


/*==============================================================================*
 * Require Configuration
 *==============================================================================*/
require_once(__DIR__.'/Config.php');


/*==============================================================================*
 * Libs And Dependencies
 *==============================================================================*/
require_once(Config::$abs_path.'/libs/php/Session.php');
require_once(Config::$abs_path.'/libs/php/Database.php');
require_once(Config::$abs_path.'/models/Model.php');
require_once(Config::$abs_path.'/controllers/Controller.php');
require_once(Config::$abs_path.'/App.php');

(new App());

