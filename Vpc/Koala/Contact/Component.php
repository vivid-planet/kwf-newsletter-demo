<?php
class Vpc_Koala_Contact_Component extends Vpc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trl('Kontaktformular');
        $ret['placeholder']['submitButton'] = trlStatic('Abschicken');
        return $ret;
    }
}
