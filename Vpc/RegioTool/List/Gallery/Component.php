<?php
class Vpc_RegioTool_List_Gallery_Component extends Vpc_List_Gallery_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $contentWidth = 800;
        $contentWidthWithSub = 575;
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
                'text' => trl('Fünf Bilder, volle Breite'),
                'width' => floor(($contentWidth - 40) / 5),
                'height' => floor(($contentWidth - 40) / 5),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 5
            ),
            '1halfWidth'=>array(
                'text' => trl('Ein Bild, mit Submenü'),
                'width' => $contentWidthWithSub-2,
                'height' => $contentWidthWithSub-2,
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 1
            ),
            '2halfWidth'=>array(
                'text' => trl('Zwei Bilder, mit Submenü'),
                'width' => floor(($contentWidthWithSub - 14) / 2),
                'height' => floor((($contentWidthWithSub - 14) / 2)/1.5),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 2
            ),
            '3halfWidth'=>array(
                'text' => trl('Drei Bilder, mit Submenü'),
                'width' => floor(($contentWidthWithSub - 26) / 3),
                'height' => floor((($contentWidthWithSub - 26) / 3)/1.5),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 3
            ),
            '4halfWidth'=>array(
                'text' => trl('Vier Bilder, mit Submenü'),
                'width' => floor(($contentWidthWithSub - 38) / 4),
                'height' => floor((($contentWidthWithSub - 38) / 4)/1.5),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 4
            ),
            '5halfWidth'=>array(
                'text' => trl('Fünf Bilder, mit Submenü'),
                'width' => floor(($contentWidthWithSub - 50) / 5),
                'height' => floor((($contentWidthWithSub - 50) / 5)/1.5),
                'scale' => Vps_Media_Image::SCALE_CROP,
                'imagesPerLine' => 5
            )
        );
        return $ret;
    }
}
