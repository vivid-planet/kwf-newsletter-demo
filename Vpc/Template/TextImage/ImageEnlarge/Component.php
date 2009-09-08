<?php
class Vpc_Template_TextImage_ImageEnlarge_Component extends Vpc_TextImage_ImageEnlarge_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['dimensions'] = array(
            'original'=>array(
                'text' => trl('original'),
                'width' => 0,
                'height' => 0,
                'scale' => Vps_Media_Image::SCALE_ORIGINAL
            ),
            'custombestfit'=>array(
                'text' => trl('user-defined bestfit'),
                'width' => self::USER_SELECT,
                'height' => self::USER_SELECT,
                'scale' => Vps_Media_Image::SCALE_BESTFIT
            ),
            'customcrop'=>array(
                'text' => trl('user-defined crop'),
                'width' => self::USER_SELECT,
                'height' => self::USER_SELECT,
                'scale' => Vps_Media_Image::SCALE_CROP
            ),
        );
        $ret['generators']['child']['component']['linkTag'] = 'Vpc_Template_TextImage_ImageEnlarge_LinkTag_Component';
        return $ret;
    }
}
