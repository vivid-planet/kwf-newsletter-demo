<?php
class Vpc_Template_Contact_Component extends Vpc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trl('Kontaktforumlar');
        $ret['placeholder']['submitButton'] = trl('Nachricht absenden');
        return $ret;
    }
}
