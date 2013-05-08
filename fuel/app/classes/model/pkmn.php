<?php

class Model_Pkmn extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'no',
		'name',
		'H',
		'A',
		'B',
		'C',
		'D',
		'S',
		'Total',
		'type1',
		'type2',
		'skill1',
		'skill2',
		'skill3',
		'egg1',
		'egg2',
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
