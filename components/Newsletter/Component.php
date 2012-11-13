<?php
class Newsletter_Component extends Kwc_NewsletterCategory_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['detail']['component'] = 'Newsletter_Detail_Component';
        return $ret;
    }
}
