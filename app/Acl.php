<?php
class Acl extends Kwf_Acl_Component
{
    public function __construct()
    {
        parent::__construct();

        //remove page tree
        $this->remove('kwf_component_pages');
        $this->add(new Zend_Acl_Resource('kwf_component_pages'));
            $this->add(new Zend_Acl_Resource('kwf_component_page'), 'kwf_component_pages');
            $this->add(new Zend_Acl_Resource('kwf_component_components'),
                                'kwf_component_pages'); // for /component/show
            $this->add(new Zend_Acl_Resource('kwf_component'),
                                'kwf_component_pages'); // for /component/edit

        $this->allow('admin');
        $this->allow('superuser');
    }
}
