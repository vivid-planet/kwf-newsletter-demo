<?php
class Vpc_iPhone_TextImage_ImageEnlarge_LinkTag_Component extends Vpc_TextImage_ImageEnlarge_LinkTag_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['link']['component']['enlarge'] = 'Vpc_iPhone_TextImage_ImageEnlarge_LinkTag_EnlargeTag_Component';
        return $ret;
    }
}
