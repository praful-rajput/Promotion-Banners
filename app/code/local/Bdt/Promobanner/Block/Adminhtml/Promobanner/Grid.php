<?php

class Bdt_Promobanner_Block_Adminhtml_Promobanner_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('promobannerGrid');
        $this->setDefaultSort('promobanner_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('promobanner/promobanner')->getCollection();

        foreach ($collection as $link) {
            if ($link->getStoreId() && $link->getStoreId() != 0) {
                $link->setStoreId(explode(',', $link->getStoreId()));
            } else {
                $link->setStoreId(array('0'));
            }
        }

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('promobanner_id', array(
            'header' => Mage::helper('promobanner')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'promobanner_id',
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('promobanner')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));

        /*
        $this->addColumn('content', array(
              'header'    => Mage::helper('promobanner')->__('Item Content'),
              'width'     => '150px',
              'index'     => 'content',
        ));
        */
        $this->addColumn('url', array(
            'header' => Mage::helper('promobanner')->__('URL'),
            'width' => '300px',
            'index' => 'url',

        ));
        if (!Mage::app()->isSingleStoreMode()) {
            $this->addColumn('store_id', array(
                'header' => Mage::helper('promobanner')->__('Store View'),
                'index' => 'store_id',
                'type' => 'store',
                'store_all' => true,
                'store_view' => true,
                'sortable' => true,
                'filter_condition_callback' => array($this,
                    '_filterStoreCondition'),
            ));
        }
        $this->addColumn('sortorder', array(
            'header' => Mage::helper('promobanner')->__('Sort Order'),
            'width' => '150px',
            'index' => 'sortorder',
            'align' => 'center',
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('promobanner')->__('Status'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'status',
            'type' => 'options',
            'options' => array(
                1 => 'Enabled',
                2 => 'Disabled',
            ),
        ));

        $this->addColumn('action',
            array(
                'header' => Mage::helper('promobanner')->__('Action'),
                'width' => '100',
                'type' => 'action',
                'getter' => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('promobanner')->__('Edit'),
                        'url' => array('base' => '*/*/edit'),
                        'field' => 'id'
                    )
                ),
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'is_system' => true,
            ));

        //$this->addExportType('*/*/exportCsv', Mage::helper('promobanner')->__('CSV'));
        //$this->addExportType('*/*/exportXml', Mage::helper('promobanner')->__('XML'));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('promobanner_id');
        $this->getMassactionBlock()->setFormFieldName('promobanner');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('promobanner')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('promobanner')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('promobanner/status')->getOptionArray();

        array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('promobanner')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus', array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('promobanner')->__('Status'),
                    'values' => $statuses
                )
            )
        ));
        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    protected function _filterStoreCondition($collection, $column)
    {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $this->getCollection()->addStoreFilter($value);
    }

}