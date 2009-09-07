<?php
chdir(dirname(__FILE__));
if (file_exists('application/include_path')) {
    define('VPS_PATH', str_replace('%vps_branch%', file_get_contents('application/vps_branch'), trim(file_get_contents('application/include_path'))));
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
$front->addControllerDirectory('application/controllers/User', 'user');

$acl = new Vps_Acl_Component();

$acl->add(new Vps_Acl_Resource_MenuDropdown('settings',
            array('text'=>'Einstellungen', 'icon'=>'wrench.png')));
    $acl->add(new Vps_Acl_Resource_MenuUrl('vps_user_users',
            array('text'=>'Benutzerverwaltung', 'icon'=>'user.png'),
            '/vps/user/users'), 'settings');
        $acl->add(new Zend_Acl_Resource('vps_user_user'), 'vps_user_users');
    $acl->add(new Vps_Acl_Resource_MenuUrl('vps_pool_pools',
            array('text'=>'Pools', 'icon'=>'book_open.png'),
            '/vps/pool/pools'), 'settings');
        $acl->add(new Zend_Acl_Resource('vps_pool_pool'), 'vps_pool_pools');


$acl->allow('admin', 'vps_user_changeuser');
$acl->allow('admin', 'vps_user_users');
$acl->allow('admin', 'settings');
$acl->allow('superuser', 'vps_user_users');
$acl->allow('superuser', 'settings');
Zend_Registry::set('acl', $acl);

$response = $front->dispatch();
$response->sendResponse();
