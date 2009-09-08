<?php
class Vpc_Template_Basic_ImageEnlarge_Component extends Vpc_Basic_ImageEnlarge_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['linkTag'] = 'Vpc_Template_TextImage_ImageEnlarge_LinkTag_EnlargeTag_Component';
        return $ret;
    }
}
