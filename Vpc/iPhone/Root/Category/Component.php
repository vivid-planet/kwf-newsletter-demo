<?php
class Vpc_iPhone_Root_Category_Component extends Vpc_Root_Category_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['page']['component'] = array(
            'paragraphs' => 'Vpc_iPhone_Paragraphs_Component',
            'link' => 'Vpc_Basic_LinkTag_Component',
            'firstChildPage' => 'Vpc_Basic_LinkTag_FirstChildPage_Component',
        );
        return $ret;
    }
}
