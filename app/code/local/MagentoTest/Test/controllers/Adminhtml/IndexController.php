<?php

/**
 * Referrer message admin area
 *
 * @author Zsolt Gál
 */
class MagentoTest_Test_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action {

	/**
	 * Listing of referrer messages
	 */
	public function indexAction() {
		$this->loadLayout();
		$this->renderLayout();
	}

	/**
	 * Editing a record
	 */
	public function editAction() {
		$id = (int) $this->getRequest()->getParam('id', 0);
		$model = Mage::getModel('test/referrer');
		if($id) {
			$model->load($id);
			if(!$model->getId()) {
				Mage::getSingleton('adminhtml/session')->addError($this->__('Referrer message doesnt exists!'));
				$this->_redirect('*/*/index');
			} else {
				$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
				if($data) {
					$model->setData($data);
					$model->setId($id);
				}
			}
		}
		Mage::register('referrer_data', $model);

		$this->loadLayout();
		$this->renderLayout();
	}

	public function newAction() {
		$this->_redirect('*/*/edit');
	}

	/**
	 * Save data from POST to database
	 */
	public function saveAction() {
		$data = $this->getRequest()->getPost();
		if($data) {
			$model = Mage::getModel('test/referrer');
			$id = (int) $this->getRequest()->getParam('id', 0);
			if($id) {
				$model->load($id);
			}
			$model->setData($data);

			Mage::getSingleton('adminhtml/session')->setFormData($data);

			try {
				if($id) {
					$model->setId($id);
				}
				$model->save();

				if(!$model->getId()) {
					throw new Exception;
				}

				Mage::getSingleton('adminhtml/session')->setFormData(false);
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Congratulations! You just successfully modified a record.'));
				$this->_redirect('*/*/index');

			} catch(Exception $exc) {
				Mage::getSingleton('adminhtml/session')->addError($this->__('Error during saving!'));
				$this->_redirect('*/*/edit');
			}
		}
	}

	public function deleteAction() {
		$id = (int) $this->getRequest()->getParam('id', 0);
		if(!$id) {
			Mage::getSingleton('adminhtml/session')->addError($this->__('Referrer message not found!'));
			$this->_redirect('*/*/index');
			return;
		}

		try {
			$model = Mage::getModel('test/referrer');
			$model->setId($id);
			$model->delete();

			Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Delete successful!'));
			$this->_redirect('*/*/index');

		} catch(Exception $exc) {

			Mage::getSingleton('adminhtml/session')->addError($exc->getMessage());
			$this->_redirect('*/*/edit', array('id' => $id));

		}
	}
}
