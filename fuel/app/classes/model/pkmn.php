<?php

class Model_Pkmn extends \Orm\Model {

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
    protected static $jointQuery = "select pk.no, pk.name as name, 	    
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
    public static function listed($array = null) {

	$query = DB::select(
			array("pkmns.name", "name"), array("pkmns.no", "no"), array("pkmns.H", "H"), array("pkmns.A", "A"), array("pkmns.B", "B"), array("pkmns.C", "C"), array("pkmns.D", "D"), array("pkmns.S", "S"), array("pkmns.id", "pid"), array("p1.name", "type1"), array("p2.name", "type2"), array("p1.id", "t1id"), array("p2.id", "t2id"), array("a1.name", "ability1"), array("a2.name", "ability2"), array("a3.name", "ability3"), array("a1.id", "a1id"), array("a2.id", "a2id"), array("a3.id", "a3id"), array("e1.name", "egg1"), array("e2.name", "egg2"), array("e1.id", "e1id"), array("e2.id", "e2id")
		)->from('pkmns')->
		join(array('abilities', 'a1'), 'LEFT')->on('pkmns.skill1', '=', 'a1.id')->
		join(array('abilities', 'a2'), 'LEFT')->on('pkmns.skill2', '=', 'a2.id')->
		join(array('abilities', 'a3'), 'LEFT')->on('pkmns.skill3', '=', 'a3.id')->
		join(array('eggs', 'e1'), 'LEFT')->on('pkmns.egg1', '=', 'e1.id')->
		join(array('eggs', 'e2'), 'LEFT')->on('pkmns.egg2', '=', 'e2.id')->
		join(array('ptypes', 'p1'), 'LEFT')->on('pkmns.type1', '=', 'p1.id')->
		join(array('ptypes', 'p2'), 'LEFT')->on('pkmns.type2', '=', 'p2.id')->
		order_by("pkmns.no", "asc");

	if (!is_null($array)) {
	    foreach ($array as $key => $value) {
		if ($key === 'type') {
		    $query = $query->where_open()->or_where('pkmns.type1', $value)->or_where('pkmns.type2', $value)->where_close();
		} else if ($key === 'ability') {
		    $query = $query->where_open()->or_where('pkmns.skill1', $value)->or_where('pkmns.skill2', $value)->or_where('pkmns.skill3', $value)->where_close();
		} else if ($key === 'egg') {
		    $query = $query->where_open()->or_where('pkmns.egg1', $value)->or_where('pkmns.egg2', $value)->where_close();
		}
	    }
	}
	return $query->execute()->as_array();
    }

    public static function oneByNo($no) {
	$query = DB::query(self::$jointQuery . " where no=:number");
	$query->bind("number", $no);
	$array = $query->execute()->as_array();
	$res = $array[0];
	//$res['name']=hex2bin($res['name']);
	return $res;
    }

    public static function findsBy($no = 1) {

	$query = DB::select(
			array("pkmns.name", "name"), array("pkmns.no", "no"), array("pkmns.H", "H"), array("pkmns.A", "A"), array("pkmns.B", "B"), array("pkmns.C", "C"), array("pkmns.D", "D"), array("pkmns.S", "S"), array("pkmns.id", "pid"), array("p1.name", "type1"), array("p2.name", "type2"), array("p1.id", "t1id"), array("p2.id", "t2id"), array("a1.name", "ability1"), array("a2.name", "ability2"), array("a3.name", "ability3"), array("a1.id", "a1id"), array("a2.id", "a2id"), array("a3.id", "a3id"), array("e1.name", "egg1"), array("e2.name", "egg2"), array("e1.id", "e1id"), array("e2.id", "e2id")
		)->from('pkmns')->
		join(array('abilities', 'a1'), 'LEFT')->on('pkmns.skill1', '=', 'a1.id')->
		join(array('abilities', 'a2'), 'LEFT')->on('pkmns.skill2', '=', 'a2.id')->
		join(array('abilities', 'a3'), 'LEFT')->on('pkmns.skill3', '=', 'a3.id')->
		join(array('eggs', 'e1'), 'LEFT')->on('pkmns.egg1', '=', 'e1.id')->
		join(array('eggs', 'e2'), 'LEFT')->on('pkmns.egg2', '=', 'e2.id')->
		join(array('ptypes', 'p1'), 'LEFT')->on('pkmns.type1', '=', 'p1.id')->
		join(array('ptypes', 'p2'), 'LEFT')->on('pkmns.type2', '=', 'p2.id')->
		where('pkmns.id', '=', $no);
	$array = $query->execute()->as_array();
	return $array[0];
    }

}