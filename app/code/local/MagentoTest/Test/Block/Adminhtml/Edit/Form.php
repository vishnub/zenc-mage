<?php

/**
 * Editor form
 *
 * @author Zsolt Gál
 */
class MagentoTest_Test_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
	public function __construct() {
		parent::__construct();
	}
	protected function _prepareForm() {
		$form = new Varien_Data_Form(array(
			'id'		=> 'edit_form',
			'action'	=> $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id', 0))),
			'method'	=> 'post',
		));
		$form->addField('referrer_name', 'text', array(
			'label'		=> $this->__('Referrer name'),
			'required'	=> true,
			'name'		=> 'referrer_name',
		));
		$form->addField('referrer_email', 'text', array(
			'label'		=> $this->__('Referrer email'),
			'required'	=> true,
			'name'		=> 'referrer_email',
		));
		$form->addField('recipient_name', 'text', array(
			'label'		=> $this->__('Recipient name'),
			'required'	=> true,
			'name'		=> 'recipient_name',
		));
		$form->addField('recipient_email', 'text', array(
			'label'		=> $this->__('Recipient email'),
			'required'	=> true,
			'name'		=> 'recipient_email',
		));
		$form->addField('message', 'textarea', array(
			'label'		=> $this->__('Message'),
			'required'	=> true,
			'name'		=> 'message',
		));
		$form->setUseContainer(true);
		$form->setValues(Mage::registry('referrer_data')->getData());
		$this->setForm($form);
		return parent::_prepareForm();
	}

}
