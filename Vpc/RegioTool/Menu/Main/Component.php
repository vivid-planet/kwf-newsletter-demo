<?php
class Vpc_RegioTool_Menu_Main_Component extends Vpc_Menu_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['level'] = 'main';
        $ret['maxLevel'] = 1;
        $ret['cssClass'] .= ' webListNone';
        $ret['liCssClasses'] = array(
            'regioTool' => trl('RegioTool'),
            'features' => trl('Alle Features'),
            'advantage' => trl('Ihre Vorteile'),
            'references' => trl('Referenzen'),
            'contact' => trl('Kontakt')
        );
        $ret['showAsEditComponent'] = true;

        $ret['generators']['subMenu'] = array(
            'class' => 'Vpc_Menu_Generator',
            'component' => 'Vpc_RegioTool_Menu_Sub_Component'
        );

        return $ret;
    }
}
