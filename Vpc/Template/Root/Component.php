<?php
class Vpc_Template_Root_Component extends Vpc_Root_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();

        $ret['generators']['box']['component']['mainMenu'] = 'Vpc_Template_Menu_Main_Component';
        $ret['generators']['box']['component']['subMenu'] = 'Vpc_Template_Menu_Sub_Component';
        $ret['generators']['box']['component']['bottomMenu'] = 'Vpc_Template_Menu_Bottom_Component';
        $ret['generators']['box']['component']['metaTags'] = 'Vpc_Box_MetaTagsContent_Component';
        $ret['generators']['title']['component'] = 'Vpc_Box_TitleEditable_Component';

        $ret['editComponents'] = array('title', 'metaTags');
        return $ret;
    }
}
