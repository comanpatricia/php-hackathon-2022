<?php
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'wamp'.DS.'www'.DS.'hackathon');

    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');                   //health includes
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    require_once(INC_PATH.DS."config.php");                                                     //load the config file first
    require_once(CORE_PATH.DS."programme.php");                                                      //core classes

?>