<?php
class Vpc_Template_List_Gallery_Component extends Vpc_List_Gallery_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $contentWidth = 800;
        $ret['dimensions'] = array(
            '1fullWidth'=>array(
                'text' => trl('Ein Bild, volle Breite'),
                'width' => $contentWidth,
                'height' => 0,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 1
            ),
            '2fullWidth'=>array(
                'text' => trl('Zwei Bilder, volle Breite'),
                'width' => floor(($contentWidth - 10) / 2),
                'height' => 0,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 2
            ),
            '3fullWidth'=>array(
                'text' => trl('Drei Bilder, volle Breite'),
                'width' => floor(($contentWidth - 20) / 3),
                'height' => 0,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 3
            ),
            '4fullWidth'=>array(
                'text' => trl('Vier Bilder, volle Breite'),
                'width' => floor(($contentWidth - 30) / 4),
                'height' => 0,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 4
            ),
            '130Width'=>array(
                'text' => trl('Ein Bild, 30% Breite'),
                'width' => floor((($contentWidth - 10) / 100) * 30),
                'height' => 0,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 1
            ),
            '230Width'=>array(
                'text' => trl('Zwei Bilder, 30% Breite'),
                'width' => floor(((($contentWidth - 30) / 100) * 30) / 2),
                'height' => 0,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 2
            ),
        );
        return $ret;
    }
}
