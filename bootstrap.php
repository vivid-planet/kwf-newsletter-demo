<?php
chdir(dirname(__FILE__));
if (file_exists('application/include_path')) {
    define('VPS_PATH', str_replace('%vps_branch%', trim(file_get_contents('application/vps_branch')), trim(file_get_contents('application/include_path'))));
} else {
    die ('VPS_PATH not found');
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

$acl = new Vps_Acl_Component();

$acl->add(new Vps_Acl_Resource_MenuDropdown('settings',
            array('text'=>trl('Einstellungen'), 'icon'=>'wrench.png')));
    $acl->add(new Vps_Acl_Resource_MenuUrl('vps_user_users',
            array('text'=>trl('Benutzerverwaltung'), 'icon'=>'user.png'),
            '/vps/user/users'), 'settings');
        $acl->add(new Zend_Acl_Resource('vps_user_user'), 'vps_user_users');

$acl->allow('admin', null);
$acl->allow('superuser', 'settings');
Zend_Registry::set('acl', $acl);

$response = $front->dispatch();
$response->sendResponse();
