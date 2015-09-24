<?php

class Bdt_Promobanner_Model_Promobanner extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('promobanner/promobanner');
    }
}