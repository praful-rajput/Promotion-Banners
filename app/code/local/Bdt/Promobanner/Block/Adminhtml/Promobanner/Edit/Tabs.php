<?php
class Bdt_Promobanner_Block_Adminhtml_Promobanner_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('promobanner_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('promobanner')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('promobanner')->__('Item Information'),
          'title'     => Mage::helper('promobanner')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('promobanner/adminhtml_promobanner_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}