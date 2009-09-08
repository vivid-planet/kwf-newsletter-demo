<?php
class Vpc_Template_Composite_ImagesEnlarge_Component extends Vpc_Composite_ImagesEnlarge_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trl('Galerie');
        $ret['generators']['child']['component'] = 'Vpc_Template_Basic_ImageEnlarge_Component';
        return $ret;
    }
}
