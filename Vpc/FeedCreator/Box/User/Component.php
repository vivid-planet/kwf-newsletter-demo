<?php
class Vpc_FeedCreator_Box_User_Component extends Vpc_User_BoxWithoutLogin_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['showLostPassword'] = false;
        $ret['cssClass'] = 'webStandard webForm webListNone';
        return $ret;
    }
}
