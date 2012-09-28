<?php

/*
 * Test module referer model install script
 */
$installer = $this;
$installer->startSetup();

// create table for referrer message model
$table = $installer->getConnection()->newTable($installer->getTable('test/referrer'))
		->addColumn('message_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
			'unsigned'	=> true,
			'nullable'	=> false,
			'primary'	=> true,
			'identity'	=> true,
		))
		->addColumn('referrer_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
			'nullable'	=> false,
		))
		->addColumn('referrer_email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
			'nullable'	=> false,
		))
		->addColumn('recipient_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
			'nullable'	=> false,
		))
		->addColumn('recipient_email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
			'nullable'	=> false,
		))
		->addColumn('message', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
			'nullable'	=> false,
		))
		->addColumn('timestamp', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
			'default'	=> Varien_Db_Ddl_Table::TIMESTAMP_INIT_UPDATE
		))
		->setComment('Referrer message data');

$installer->getConnection()->createTable($table);

$installer->endSetup();
