<?php
class Vpc_Template_Paragraphs_Component extends Vpc_Paragraphs_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['paragraphs']['component'] = array();
        $ret['generators']['paragraphs']['component']['textImage'] = 'Vpc_Template_TextImage_Component';
        $ret['generators']['paragraphs']['component']['image'] = 'Vpc_Template_Basic_Image_Component';
        $ret['generators']['paragraphs']['component']['imagesEnlarge'] = 'Vpc_Template_Composite_ImagesEnlarge_Component';
        $ret['generators']['paragraphs']['component']['space'] = 'Vpc_Basic_Space_Component';
        $ret['generators']['paragraphs']['component']['downloads'] = 'Vpc_Composite_Downloads_Component';
        $ret['generators']['paragraphs']['component']['links'] = 'Vpc_Composite_Links_Component';
        $ret['generators']['paragraphs']['component']['line'] = 'Vpc_Basic_Line_Component';
        $ret['generators']['paragraphs']['component']['contact'] = 'Vpc_Template_Contact_Component';
        $ret['generators']['paragraphs']['component']['googlemap'] = 'Vpc_Template_Advanced_GoogleMap_Component';
        $ret['generators']['paragraphs']['component']['imprint'] = 'Vpc_Advanced_Imprint_Imprint_Component';
        $ret['generators']['paragraphs']['component']['vividPlanet'] = 'Vpc_Advanced_Imprint_VividPlanet_Component';
        $ret['generators']['paragraphs']['component']['googleAnalytics'] = 'Vpc_Advanced_Imprint_GoogleAnalytics_Component';
        $ret['generators']['paragraphs']['component']['disclaimer'] = 'Vpc_Advanced_Imprint_Disclaimer_Component';
        return $ret;
    }
}
