<?php
class Vpc_Template_TextImage_ImageEnlarge_LinkTag_EnlargeTag_Component extends Vpc_TextImage_ImageEnlarge_LinkTag_EnlargeTag_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['link'] = 'Vpc_Basic_Link_Component';
        $ret['assets']['files'][] = 'web/Vpc/Template/TextImage/ImageEnlarge/LinkTag/EnlargeTag/Component.js';
        return $ret;
    }
}
