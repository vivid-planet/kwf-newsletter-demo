<?php
class Vpc_RegioTool_Blog_Top_Component extends Vpc_News_TopChoose_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['showDirectoryClass'] = 'Vpc_RegioTool_Blog_Component';
        $ret['generators']['child']['component']['view'] = 'Vpc_RegioTool_Blog_Top_View_Component';
        $ret['limit'] = 4;
        return $ret;
    }
}
