<?php
chdir(dirname(__FILE__));
if (file_exists('application/include_path')) {
    define('VPS_PATH', str_replace('%vps_branch%', trim(file_get_contents('application/vps_branch')), trim(file_get_contents('application/include_path'))));
} else {
    define('VPS_PATH', dirname(__FILE__).'/vps-lib');
}
$include_path  = get_include_path();
$include_path .= PATH_SEPARATOR . 'application/controllers';
$include_path .= PATH_SEPARATOR . 'application/models';
$include_path .= PATH_SEPARATOR . VPS_PATH;
set_include_path($include_path);
require_once 'Vps/Setup.php';
Vps_Setup::setUp();
Vps_Setup::dispatchVpc();
Vps_Setup::dispatchMedia();
Vps_Assets_Loader::load();

$front = Vps_Controller_Front_Component::getInstance();

$acl = new Vps_Acl_Component_IsiWeb();
Zend_Registry::set('acl', $acl);

$response = $front->dispatch();
$response->sendResponse();
