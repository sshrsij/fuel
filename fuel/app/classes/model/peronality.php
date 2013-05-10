<?php

class Model_Peronality extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'A',
		'B',
		'C',
		'D',
		'S',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
}
