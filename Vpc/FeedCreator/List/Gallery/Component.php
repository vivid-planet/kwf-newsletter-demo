<?php
class Vpc_FeedCreator_List_Gallery_Component extends Vpc_List_Gallery_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $contentWidth = 800;
        $ret['dimensions'] = array(
            '1fullWidth'=>array(
                'text' => trl('Ein Bild, volle Breite'),
                'width' => $contentWidth,
                'height' => $contentWidth,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 1
            ),
            '2fullWidth'=>array(
                'text' => trl('Zwei Bilder, volle Breite'),
                'width' => floor(($contentWidth - 10) / 2),
                'height' => floor(($contentWidth - 10) / 2),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 2
            ),
            '3fullWidth'=>array(
                'text' => trl('Drei Bilder, volle Breite'),
                'width' => floor(($contentWidth - 20) / 3),
                'height' => floor(($contentWidth - 20) / 3),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 3
            ),
            '4fullWidth'=>array(
                'text' => trl('Vier Bilder, volle Breite'),
                'width' => floor(($contentWidth - 30) / 4),
                'height' => floor(($contentWidth - 30) / 4),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 4
            ),
            '5fullWidth'=>array(
                'text' => trl('
        return $ret;
    }
}
