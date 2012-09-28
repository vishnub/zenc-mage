<?php
/**
 * Referrer messages list
 *
 * @author Zsolt Gál
 */
class MagentoTest_Test_Block_Adminhtml_List extends Mage_Adminhtml_Block_Widget_Grid_Container {

	public function _construct() {
		$this->_controller = 'adminhtml_list';
		$this->_blockGroup = 'test';
		$this->_headerText = $this->__('Referrer messages');
	}

	/**
	 * @todo comment this block out and move layout logick to appropriate xml config
	 */
	protected function _prepareLayout() {
       $this->setChild( 'grid',
           $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
           $this->_controller . '.grid')->setSaveParametersInSession(true) );
       return parent::_prepareLayout();
	}

}