<?php

/**
 * Referrer message collection
 *
 * @author Zsolt Gál
 */
class MagentoTest_Test_Model_Mysql4_Referrer_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

	public function _construct() {
		$this->_init('test/referrer');
	}

}
