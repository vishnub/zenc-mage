<?php

/*
 * Test module referrer data install script
 */
$installer = $this;
$installer->startSetup();
$installer->getConnection()->insert($installer->getTable('test/referrer'), array(
	'referrer_name'		=> 'John Doe',
	'referrer_email'	=> 'john.doe@example.com',
	'recipient_name'	=> 'Kevin Smith',
	'recipient_email'	=> 'kevin@smith.com',
	'message'			=> 'Hi there!',
));
$installer->endSetup();
?>
