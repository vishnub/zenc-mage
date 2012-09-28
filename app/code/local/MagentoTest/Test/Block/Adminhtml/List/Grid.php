<?php

/**
 * Grid block
 *
 * @author Zsolt Gál
 */
class MagentoTest_Test_Block_Adminhtml_List_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('list_grid');
        $this->setDefaultSort('message_id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

	protected function _prepareCollection() {
		$collection = Mage::getModel('test/referrer')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

    protected function _prepareColumns() {
        $this->addColumn('message_id', array(
            'header'    => $this->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'message_id',
        ));

        $this->addColumn('referrer_name', array(
            'header'    => $this->__('Referrer Name'),
            'align'     =>'left',
            'index'     => 'referrer_name',
        ));
        $this->addColumn('referrer_email', array(
            'header'    => $this->__('Referrer Email'),
            'align'     =>'left',
            'index'     => 'referrer_email',
        ));

        $this->addColumn('recipient_name', array(
            'header'    => $this->__('Recipient Name'),
            'align'     =>'left',
            'index'     => 'recipient_name',
        ));
        $this->addColumn('recipient_email', array(
            'header'    => $this->__('Recipient Email'),
            'align'     =>'left',
            'index'     => 'recipient_email',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
