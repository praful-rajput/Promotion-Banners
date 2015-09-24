<?php

class Bdt_Promobanner_Block_Adminhtml_Promobanner_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'promobanner';
        $this->_controller = 'adminhtml_promobanner';
        
        $this->_updateButton('save', 'label', Mage::helper('promobanner')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('promobanner')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('promobanner_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'promobanner_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'promobanner_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('promobanner_data') && Mage::registry('promobanner_data')->getId() ) {
            return Mage::helper('promobanner')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('promobanner_data')->getTitle()));
        } else {
            return Mage::helper('promobanner')->__('Add Item');
        }
    }
}