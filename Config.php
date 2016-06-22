<?php
// Switch the right configuration file to load
/*switch ($_SERVER['HTTP_HOST'])
{
    case 'www.dia-techshop.it':
            require_once(__DIR__.'/Config-production.php');
        break;
    
    default:
            require_once(__DIR__.'/Config-localhost.php');
        break;
}
*/
require_once(__DIR__.'/Config-production.php');