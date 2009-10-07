<?php
class Vpc_Template_Contact_Form extends Vps_Form
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
        $row->subject = trlVps('Enquiry on {0}',$host);
    }

    protected function _init()
    {
        $this->setModel(new Vps_Model_Mail(array('tpl' => 'Contact')));

        $this->add(new Vps_Form_Field_TextField('firstname', trlVps('Firstname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('lastname', trlVps('Lastname')))
            ->setWidth(255)
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('company', trlVps('Company')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('street', trlVps('Street')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('city', trlVps('ZIP / City')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextField('email', trlVps('E-Mail')))
            ->setWidth(255)
            ->setVtype('email')
            ->setAllowBlank(false);
        $this->add(new Vps_Form_Field_TextField('phone', trlVps('Phone')))
            ->setWidth(255);
        $this->add(new Vps_Form_Field_TextArea('content', trlVps('Message')))
            ->setWidth(255)
            ->setHeight(120)
            ->setAllowBlank(false);
        parent::_init();
    }
}
