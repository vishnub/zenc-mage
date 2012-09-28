<?php

/**
 * Renders a message editor block
 *
 * @author Zsolt Gál
 */
class MagentoTest_Test_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'test';
        $this->_controller = 'adminhtml_edit';

        $this->_updateButton('save', 'label', $this->__('Save Message'));
        $this->_updateButton('delete', 'label', $this->__('Delete Message'));

    }

	protected function _prepareLayout() {
       $this->setChild( 'form',
           $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_form',
           $this->_controller . '.form')->setSaveParametersInSession(true) );
       return parent::_prepareLayout();
	}

	public function getHeaderText() {
		if(Mage::registry('referrer_data')->getId()) {
			// model is loaded from database
			return $this->__('Edit record %d', Mage::registry('referrer_data')->getId());
		} else {
			return $this->__('New record');
		}
	}
}
