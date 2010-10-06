<?php
class Vpc_RegioTool_Blog_Top_View_Component extends Vpc_Rssinclude_Blog_View_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['viewCache'] = true;
        $ret['generators']['child']['component']['paging'] = false;
        return $ret;
    }
}
