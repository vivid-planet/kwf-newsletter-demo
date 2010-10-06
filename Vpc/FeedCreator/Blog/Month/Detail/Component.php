<?php
class Vpc_FeedCreator_Blog_Month_Detail_Component extends Vpc_Directories_Month_Detail_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['view'] = 'Vpc_FeedCreator_Blog_View_Component';
        return $ret;
    }
}
