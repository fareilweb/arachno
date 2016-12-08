<?php
if($_SERVER["SERVER_NAME"] == "localhost"){
    require dirname(__FILE__) . '/Config-localhost.php';
}else{
    require dirname(__FILE__) . '/Config-production.php';
}
