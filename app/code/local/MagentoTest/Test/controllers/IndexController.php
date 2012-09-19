<?php

/**
 * IndexController
 * 
 * Controller for displaying various test data
 * @package magento.development.local
 * @since 2012.09.17.
 * @author Zsolt Gál
 */
class MagentoTest_Test_IndexController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		$this->loadLayout();
		$this->renderLayout();
	}

}
