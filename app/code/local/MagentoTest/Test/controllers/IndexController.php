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

	/**
	 * Display referrer form
	 */
	public function formAction() {
		$this->loadLayout();
		$this->getLayout()->getBlock('referrerForm')
				->setFormAction(Mage::getUrl('*/*/post'))
				->setFormKey($this->getFormKey());
		$this->_initLayoutMessages('core/session');
		$this->renderLayout();
	}

	/**
	 * Validate referrer form data and save it to database
	 */
	public function postAction() {

		try {
			if(!$this->getRequest()->getPost()) {
				throw new Exception;
			}
			$data = new Varien_Object();
			$data->setData($this->getRequest()->getPost());

			// csrf token
			if(!Zend_Validate::is($data['form_key'], 'Callback', function($value) {
				return $value == Mage::getSingleton('core/session')->getTestFormKey();
			})) {
				throw new Exception('form');
			}
			// referrer
			if(!Zend_Validate::is($data['referrer_name'], 'NotEmpty')) {
				throw new Exception;
			}
			if(!Zend_Validate::is($data['referrer_email'], 'EmailAddress')) {
				throw new Exception;
			}
			// recipient
			if(!Zend_Validate::is($data['recipient_name'], 'NotEmpty')) {
				throw new Exception;
			}
			if(!Zend_Validate::is($data['recipient_email'], 'EmailAddress')) {
				throw new Exception;
			}
			// message
			if(!Zend_Validate::is($data['message'], 'NotEmpty')) {
				throw new Exception;
			}
			if(!Zend_Validate::is($data['message'], 'LessThan', array('max' => 2048))) {
				throw new Exception;
			}

			$message = Mage::getModel('test/referrer');
			$message->setData($data->getData());
			$message->setData('timestamp', time());
			$message->save();

			Mage::getSingleton('core/session')->addSuccess($this->__('Message sended successfully!'));
		} catch(Exception $exc) {
			Mage::getSingleton('core/session')->addError($this->__('An error occured during sending! Please try again later.'));
		}

		$this->_redirect('*/*/form');
	}

	/**
	 * Generates random string to validate form against cross-site request attacks
	 *
	 * @return string
	 */
	public function getFormKey() {
		$token = Mage::helper('core')->getRandomString(16);
		Mage::getSingleton('core/session')->setTestFormKey($token);
		return $token;
	}

}
