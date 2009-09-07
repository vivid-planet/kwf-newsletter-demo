<?php
class Vpc_iPhone_Basic_ImageEnlarge_Component extends Vpc_Basic_ImageEnlarge_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['linkTag'] = 'Vpc_iPhone_TextImage_ImageEnlarge_LinkTag_EnlargeTag_Component';
        return $ret;
    }
}
