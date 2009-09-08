<?php
class Vpc_Template_Contact_Component extends Vpc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlVps('Contactform');
        $ret['placeholder']['submitButton'] = trlVps('Send message');
        return $ret;
    }
}
