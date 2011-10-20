<?php
class Vpc_Koala_Contact_Component extends Vpc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trl('Contactform');
        $ret['placeholder']['submitButton'] = trlStatic('Submit');
        return $ret;
    }
}
