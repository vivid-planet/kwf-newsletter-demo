<?php
class Contact_FrontendForm extends Kwf_Form
{
    protected function _beforeSave(Kwf_Model_Row_Interface $row)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $host = $_SERVER['HTTP_HOST'];
        } else {
            $host = Kwf_Registry::get('config')->server->domain;
        }

        $row->addTo('office@vivid-planet.com');
        $row->setFrom($row->email);
        $row->subject = trl('Anfrage auf {0}',$host);
    }

    protected function _init()
    {
        $this->setModel(new Kwf_Model_Mail(array('tpl' => 'Contact')));

        $this->add(new Kwf_Form_Field_TextField('firstname', trlKwfStatic('Firstname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Kwf_Form_Field_TextField('lastname', trlKwfStatic('Lastname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Kwf_Form_Field_TextField('organisation', trlKwfStatic('Organisation')))
            ->setWidth(255);
        $this->add(new Kwf_Form_Field_TextField('street', trlKwfStatic('Street')))
            ->setWidth(255);
        $this->add(new Kwf_Form_Field_TextField('city', trlKwfStatic('ZIP / City')))
            ->setWidth(255);
        $this->add(new Kwf_Form_Field_TextField('email', trlKwfStatic('E-Mail')))
            ->setWidth(255)
            ->setVtype('email')
            ->setAllowBlank(false);
        $this->add(new Kwf_Form_Field_TextField('phone', trlKwfStatic('Phone')))
            ->setWidth(255);
        $this->add(new Kwf_Form_Field_TextArea('content', trlKwfStatic('Message')))
            ->setWidth(255)
            ->setHeight(120)
            ->setAllowBlank(false);
        parent::_init();
    }
}
