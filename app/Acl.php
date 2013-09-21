<?php
class Acl extends Kwf_Acl_Component
{
    public function __construct()
    {
        parent::__construct();

        //remove page tree
        $this->remove('kwf_component_pages');
    }
}
