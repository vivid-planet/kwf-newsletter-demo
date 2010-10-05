<?php
class Vpc_FeedCreator_Menu_Sub_Component extends Vpc_Menu_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['level'] = 2;
        $ret['maxLevel'] = 2;
        $ret['cssClass'] .= ' webListNone';
        return $ret;
    }
}