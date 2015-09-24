<?php

class Bdt_Promobanner_Block_Adminhtml_Promobanner_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('promobanner_form', array('legend' => Mage::helper('promobanner')->__('Item information')));

        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('promobanner')->__('Title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title',
        ));

        if (!Mage::app()->isSingleStoreMode()) {
            $fieldset->addField('store_id', 'multiselect', array(
                'name' => 'stores[]',
                'label' => Mage::helper('promobanner')->__('Store View'),
                'title' => Mage::helper('promobanner')->__('Store View'),
                'required' => true,
                'values' => Mage::getSingleton('adminhtml/system_store')
                    ->getStoreValuesForForm(false, true),
            ));
        } else {
            $fieldset->addField('store_id', 'hidden', array(
                'name' => 'stores[]',
                'value' => Mage::app()->getStore(true)->getId()
            ));
        }

        $fieldset->addField('filename', 'file', array(
            'label' => Mage::helper('promobanner')->__('File'),
            'required' => false,
            'name' => 'filename',
        ));

        $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('promobanner')->__('Status'),
            'name' => 'status',
            'values' => array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('promobanner')->__('Enabled'),
                ),

                array(
                    'value' => 2,
                    'label' => Mage::helper('promobanner')->__('Disabled'),
                ),
            ),
        ));

        $fieldset->addField('content', 'editor', array(
            'name' => 'content',
            'label' => Mage::helper('promobanner')->__('Content'),
            'title' => Mage::helper('promobanner')->__('Content'),
            'style' => 'width:528px; height:109px;',
            'wysiwyg' => false,
            'required' => true,
        ));

        $fieldset->addField('url', 'text', array(
            'label' => Mage::helper('promobanner')->__('URL'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'url',
        ));

        $fieldset->addField('sortorder', 'text', array(
            'label' => Mage::helper('promobanner')->__('Sort Order'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'sortorder',
        ));


        /*  $fieldset->addField('url2', 'text', array(
             'label'     => Mage::helper('promobanner')->__('url2'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'url2',
         ));

          $fieldset->addField('url', 'text', array(
             'label'     => Mage::helper('promobanner')->__('URL'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'url',
         ));*/


        if (Mage::getSingleton('adminhtml/session')->getStaticbannerData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getStaticbannerData());
            Mage::getSingleton('adminhtml/session')->setStaticbannerData(null);
        } elseif (Mage::registry('promobanner_data')) {
            $form->setValues(Mage::registry('promobanner_data')->getData());
        }
        return parent::_prepareForm();
    }
}