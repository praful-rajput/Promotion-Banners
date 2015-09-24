<?php

class Bdt_Promobanner_Model_Mysql4_Promobanner extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the promobanner_id refers to the key field in your database table.
        $this->_init('promobanner/promobanner', 'promobanner_id');
    }
}