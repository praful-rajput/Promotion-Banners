<?php

class Bdt_Promobanner_Block_Adminhtml_Promobanner extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_promobanner';
        $this->_blockGroup = 'promobanner';
        $this->_headerText = Mage::helper('promobanner')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('promobanner')->__('Add Item');
        parent::__construct();
    }
}