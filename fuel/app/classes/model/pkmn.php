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
	/**
	 * createview‚µ‚Ä‚¨‚¯‚Á‚Äƒf[ƒ^‚ğ•Ô‚µ‚Ü‚·
	 */
	public static function listed()
	{
		$query="select 
pk.no,pk.name,
pk.H,pk.A,pk.B,pk.C,pk.D,pk.S,
p1.name as type1,p2.name as type2,
a1.name as ability1,a2.name as ability2,a3.name as ability3,
e1.name as egg1,e2.name as egg2
from pkmns as pk
left join abilities as a1 on a1.id = pk.skill1
left join abilities as a2 on a2.id = pk.skill2
left join abilities as a3 on a3.id = pk.skill3
left join eggs as e1 on e1.id = pk.egg1
left join eggs as e2 on e2.id = pk.egg2
left join ptypes as p1 on p1.id = pk.type1
left join ptypes as p2 on p2.id = pk.type2";
		return DB::query($query)->execute()->as_array();
	}
}
