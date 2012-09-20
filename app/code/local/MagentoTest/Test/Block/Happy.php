<?php

/**
 * Happy block
 * 
 * Contains a method to display current time
 * @package magento.development.local
 * @since 2012.09.19.
 * @author Zsolt Gál
 */
class MagentoTest_Test_Block_Happy extends Mage_Core_Block_Template {

	/**
	 * Returns current time in hour:minute format
	 * 
	 * @return string 
	 */
	public function getCurrentTime() {
		return date('H:i');
	}

}
