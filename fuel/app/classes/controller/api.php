<?php

class Controller_api extends Fuel\Core\Controller_Rest {

    protected $format = 'json';
    public function get_pkAbilities($no) {
	$qstring='select 
	    a1.id as a1id, a1.name as a1name, a1.detail as a1text,
	    a2.id as a2id, a2.name as a2name, a2.detail as a2text,	    
	    a3.id as a3id, a3.name as a3name, a3.detail as a3text	    
	    from pkmns 
	    left join Abilities as a1 on a1.id = pkmns.skill1 
	    left join Abilities as a2 on a2.id = pkmns.skill2 
	    left join Abilities as a3 on a3.id = pkmns.skill3 	    
	    where pkmns.id = :number
	    ';
	$query = DB::query($qstring);	
	$query->bind('number',$no);
	$resultArray=$query->execute()->as_array();
	$res=$resultArray[0];
	$this->response(array(
	    'Ability1' => array(
		'id'=>$res['a1id'],
		'name'=>$res['a1name'],
		'text'=>$res['a1text']
		),
	    'Ability2' => array(
		'id'=>$res['a2id'],
		'name'=>$res['a2name'],
		'text'=>$res['a2text']
		),
	    'Ability3' => array(
		'id'=>$res['a3id'],
		'name'=>$res['a3name'],
		'text'=>$res['a3text']
		)	    
	    ));
    }

    public function get_pkSkills($no){
	$qstring="
	    SELECT sk.id AS sid, sk.name AS Name,
	    sk.power, sk.hit, sk.pp, sk.ptype, sk.skilltype,
	    sk.touch, sk.range, sk.effect, sk.memo, 
	    pt.id AS pid, pt.name AS type,
	    lh.lv, lh.wayto as how
	    FROM skills AS sk, ptypes AS pt, learnhows AS lh 
	    WHERE lh.no =:number 
	    AND pt.id = sk.ptype 
	    AND lh.skill = sk.id";
	$query = DB::query($qstring);	
	$query->bind('number',$no);
	$resultArray=$query->execute()->as_array();
	$this->response($resultArray);	
    }
}

?>
