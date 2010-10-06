<?php
class Vpc_RegioTool_Blog_Component extends Vpc_NewsCategory_Component
{
    static public function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trl('Blog');
        $ret['generators']['categories']['class'] = 'Vps_Component_Generator_Page_Static';
        $ret['generators']['categories']['component'] = 'Vpc_RegioTool_Blog_Category_Directory_Component';
        $ret['generators']['child']['component']['view'] = 'Vpc_RegioTool_Blog_View_Component';
        $ret['generators']['detail']['component'] = 'Vpc_RegioTool_Blog_Detail_Component';

        $ret['generators']['month'] = array(
            'class'     => 'Vps_Component_Generator_Page_Static',
            'component' => 'Vpc_RegioTool_Blog_Month_Directory_Component',
            'name'      => 'Monate'
        );
        $ret['generators']['newsBox'] = array(
            'class' => 'Vps_Component_Generator_Box_Static',
            'component' => 'Vpc_RegioTool_Blog_Box_Component',
            'box' => 'submenuLeft',
            'inherit' => true
        );
        $ret['generators']['blogCategories'] = array(
            'class' => 'Vps_Component_Generator_Box_Static',
            'component' => 'Vpc_RegioTool_Blog_Box_Component',
            'inherit' => true
        );
        return $ret;
    }
}
