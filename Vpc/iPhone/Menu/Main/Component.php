<?php
class Vpc_iPhone_Menu_Main_Component extends Vpc_Menu_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['level'] = 'main';
        $ret['maxLevel'] = 1;
        $ret['cssClass'] .= ' webListNone';
        
        $ret['generators']['subMenu'] = array(
            'class' => 'Vpc_Menu_Generator',
            'component' => 'Vpc_iPhone_Menu_Sub_Component'
        );
        
        return $ret;
    }
}
