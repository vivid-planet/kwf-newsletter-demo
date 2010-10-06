<?php
class Vpc_FeedCreator_User_Register_Form_Component extends Vpc_User_Register_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['cssClass'] = 'webFieldset';
        //$ret['generators']['child']['component']['success'] = 'Vpc_FeedCreator_User_Register_Form_Success_Component';
        $ret['placeholder']['submitButton'] = trl('Create my Account');
        return $ret;
    }

    protected function _afterInsert(Vps_Model_Row_Interface $row)
    {
        parent::_afterInsert($row);
        Zend_Session::start();
        $m = Vps_Model_Abstract::getInstance('Boxes');
        $s = $m->select()
            ->whereEquals('session_id', Zend_Session::getId())
            ->whereNull('user_id');
        foreach ($m->getRows($s) as $box) {
            $box->user_id = $row->id;
            $box->save();
        }
    }

    protected function _initUserForm()
    {
        $this->_form->add(new Vpc_FeedCreator_User_Detail_Form('general', null))
            ->setIdTemplate("{0}");
        unset($this->_form->fields['general']->fields['title']);
        unset($this->_form->fields['general']->fields['gender']);
        unset($this->_form->fields['general']->fields['firstname']);
        unset($this->_form->fields['general']->fields['lastname']);
    }
}
