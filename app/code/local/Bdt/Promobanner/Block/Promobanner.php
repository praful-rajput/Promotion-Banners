<?php
class Bdt_Promobanner_Block_Promobanner extends Mage_Core_Block_Template
{

    protected function _construct()
    {
        $this->setCacheLifetime(3600);
    }
    public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getStaticbanner()     
     { 
        if (!$this->hasData('promobanner')) {
            $this->setData('promobanner', Mage::registry('promobanner'));
        }
        return $this->getData('promobanner');
        
    }
}