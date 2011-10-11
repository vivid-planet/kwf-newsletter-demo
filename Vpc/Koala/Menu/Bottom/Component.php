<?php
class Vpc_Koala_Menu_Bottom_Component extends Vpc_Menu_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['level'] = 'bottom';
        $ret['maxLevel'] = 1;
        $ret['cssClass'] .= ' webListNone';
        return $ret;
    }
}
