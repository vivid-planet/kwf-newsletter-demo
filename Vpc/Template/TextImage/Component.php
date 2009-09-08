<?php
class Vpc_Template_TextImage_Component extends Vpc_TextImage_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['image'] = 'Vpc_Template_TextImage_ImageEnlarge_Component';
        return $ret;
    }
}
