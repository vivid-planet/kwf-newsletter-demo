<?php
class Root_Component extends Kwc_Root_Abstract
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['newsletter'] = array(
            'class' => 'Kwf_Component_Generator_Static',
            'component' => 'Newsletter_Component'
        );

        $ret['generators']['subscribe'] = array(
            'class' => 'Kwf_Component_Generator_Static',
            'component' => 'Newsletter_Subscribe_Component'
        );

        $ret['generators']['home'] = array(
            'class' => 'Kwf_Component_Generator_Page_Static',
            'component' => 'Home_Component'
        );

        $ret['contentWidth'] = 930;
        return $ret;
    }

    //static home
    public function getPageByUrl($path, $acceptLangauge)
    {
        if ($path == '') {
            return $this->getData()->getChildComponent('_home');
        } else {
            return parent::getPageByUrl($path, $acceptLangauge);
        }
    }
}
