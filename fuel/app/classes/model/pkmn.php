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
	
	protected static $jointQuery="select pk.no,pk.name, 
	    
	    pk.H,pk.A,pk.B,pk.C,pk.D,pk.S, 
	    pk.id as pid,
	    p1.name as type1, p2.name as type2, 
	    p1.id as t1id, p2.id as t2id,
	    a1.name as ability1, a2.name as ability2, a3.name as ability3, 
	    a1.id as a1id, a2.id as a2id, a3.id as a3id, 
	    e1.name as egg1, e2.name as egg2, 
	    e1.id as e1id , e2.id as e2id
	    from pkmns as pk 
	    left join abilities as a1 on a1.id = pk.skill1 
	    left join abilities as a2 on a2.id = pk.skill2 
	    left join abilities as a3 on a3.id = pk.skill3 
	    left join eggs as e1 on e1.id = pk.egg1 
	    left join eggs as e2 on e2.id = pk.egg2 
	    left join ptypes as p1 on p1.id = pk.type1 
	    left join ptypes as p2 on p2.id = pk.type2";
	/**
	 */
	
	public static function listed()
	{
		$query=self::$jointQuery." order by pk.no";
		return DB::query($query)->execute()->as_array();
	}
	public static function oneByNo($no)
	{
		$query=DB::query(self::$jointQuery." where no=:number");
		$query->bind("number",$no);
		$array=$query->execute()->as_array();
		return $array[0];
	}
		
}