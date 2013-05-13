<?php

class Model_Learning extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'no',
		'lv',
		'way',
		'name',
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
