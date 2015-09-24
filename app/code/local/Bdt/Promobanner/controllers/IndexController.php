<?php
class Bdt_Promobanner_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/promobanner?id=15
    	 *  or
    	 * http://site.com/promobanner/id/15
    	 */
    	/* 
		$promobanner_id = $this->getRequest()->getParam('id');

  		if($promobanner_id != null && $promobanner_id != '')	{
			$promobanner = Mage::getModel('promobanner/promobanner')->load($promobanner_id)->getData();
		} else {
			$promobanner = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($promobanner == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$promobannerTable = $resource->getTableName('promobanner');
			
			$select = $read->select()
			   ->from($promobannerTable,array('promobanner_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$promobanner = $read->fetchRow($select);
		}
		Mage::register('promobanner', $promobanner);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}