<?php
class Vpc_FeedCreator_Root_Component extends Vpc_Root_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();

        $ret['generators']['box']['component']['mainMenu'] = 'Vpc_FeedCreator_Menu_Main_Component';
        $ret['generators']['box']['component']['subMenu'] = 'Vpc_FeedCreator_Menu_Sub_Component';
        $ret['generators']['box']['component']['bottomMenu'] = 'Vpc_FeedCreator_Menu_Bottom_Component';
        $ret['generators']['box']['component']['metaTags'] = 'Vpc_Box_MetaTagsContent_Component';
        $ret['generators']['title']['component'] = 'Vpc_Box_TitleEditable_Component';

        $ret['generators']['blogCategories'] = array(
            'class' => 'Vps_Component_Generator_Box_Static',
            'component' => 'Vpc_Basic_Empty_Component',
            'inherit' => true
        );
        $ret['generators']['userBox'] = array(
            'class' => 'Vps_Component_Generator_Box_Static',
            'component' => 'Vpc_FeedCreator_Box_User_Component',
            'inherit' => true,
            'unique' => true
        );
        $ret['generators']['register'] = array(
            'class' => 'Vps_Component_Generator_Page_Static',
            'component' => 'Vpc_FeedCreator_User_Register_Component',
            'name' => trl('Register')
        );
        $ret['generators']['activate'] = array(
            'class' => 'Vps_Component_Generator_Page_Static',
            'component' => 'Vpc_FeedCreator_User_Activate_Component',
            'name' => trl('Activate')
        );
        $ret['generators']['lostPassword'] = array(
            'class' => 'Vps_Component_Generator_Page_Static',
            'component' => 'Vpc_FeedCreator_User_LostPassword_Component',
            'name' => trl('Lost Password')
        );
        $ret['generators']['login'] = array(
            'class' => 'Vps_Component_Generator_Page_Static',
            'component' => 'Vpc_FeedCreator_User_Login_Component',
            'name' => trl('Login')
        );

        $ret['editComponents'] = array('title', 'metaTags');
        return $ret;
    }
}
