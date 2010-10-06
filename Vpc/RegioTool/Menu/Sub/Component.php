<?php
class Vpc_RegioTool_Menu_Sub_Component extends Vpc_Menu_Expanded_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['level'] = 2;
        $ret['maxLevel'] = 3;
        $ret['cssClass'] .= ' webListNone';
        return $ret;
    }
}