<?php
class Vpc_RegioTool_Blog_Box_Component extends Vpc_Directories_Menu_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['cssClass'] .= ' webListNone';
        return $ret;
    }

    protected function _getItemDirectory()
    {
        $data = $this->getData();
        while ($data = $data->parent) {
            if ($data->componentClass == 'Vpc_RegioTool_Blog_Component') {
                return $data;
            }
        }
        return null;
        
    }

}
