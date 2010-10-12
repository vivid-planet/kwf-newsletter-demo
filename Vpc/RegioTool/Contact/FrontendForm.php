<?php
class Vpc_RegioTool_Contact_FrontendForm extends Vps_Form
{
    protected function _beforeSave(Vps_Model_Row_Interface $row)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $host = $_SERVER['HTTP_HOST'];
        } else {
            $host = Vps_Registry::get('config')->server->domain;
        }

        $row->addTo('rf@vivid-planet.com');
        $row->setFrom($row->email);
        $row->subject = trl('Anfrage auf {0}',$host);
    }

    protected function _init()
    {
        $this->setModel(new Vps_Model_Mail(array('tpl' => 'Contact')));

        $this->add(new Vps_Form_Field_TextField('firstname', trlVpsStatic('Firstname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('lastname', trlVpsStatic('Lastname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('company', trlVpsStatic('Company')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('street', trlVpsStatic('Street')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('city', trlVpsStatic('ZIP / City')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('email', trlVpsStatic('E-Mail')))
            ->setWidth(255)
            ->setVtype('email')
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('phone', trlVpsStatic('Phone')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextArea('content', trlVpsStatic('Message')))
            ->setWidth(255)
            ->setHeight(120)
            ->setAllowBlank(false);
        parent::_init();
    }
}
