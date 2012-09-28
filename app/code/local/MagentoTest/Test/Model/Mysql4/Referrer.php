<?php

/**
 * Referrer message mysql resource model
 *
 * @author Zsolt Gál
 */
class MagentoTest_Test_Model_Mysql4_Referrer extends Mage_Core_Model_Mysql4_Abstract {
	protected function _construct() {
		$this->_init('test/referrer', 'message_id');
	}
}
