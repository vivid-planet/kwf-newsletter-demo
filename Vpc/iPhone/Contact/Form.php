<?php
class Vpc_iPhone_Contact_Form extends Vps_Form
{
    protected function _beforeSave(Vps_Model_Row_Interface $row)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $host = $_SERVER['HTTP_HOST'];
        } else {
            $host = Vps_Registry::get('config')->server->domain;
        }

        $row->addTo('christoph@vivid.vps');
        $row->setFrom($row->email);
        $row->subject = 'Anfrage auf '.$host;
    }

    protected function _init()
    {
        $this->setModel(new Vps_Model_Mail(array('tpl' => 'Contact')));

        $this->add(new Vps_Form_Field_TextField('firstname', trl('Vorname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('lastname', trl('Nachname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('company', trl('Firma')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('street', trl('Straße')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('city', trl('PLZ / Ort')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('email', trl('E-Mail')))
            ->setWidth(255)
            ->setVtype('email')
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('phone', trl('Telefon')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextArea('content', trl('Anmerkung')))
            ->setWidth(255)
            ->setHeight(120)
            ->setAllowBlank(false);
        parent::_init();
    }
}
