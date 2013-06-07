<?php

class Controller_api extends Fuel\Core\Controller_Rest {

    protected $format = 'json';

    public function get_pkAbilities($no = 1) {
	$qstring = 'select 
        a1.id as a1id, a1.name as a1name, a1.detail as a1text,
        a2.id as a2id, a2.name as a2name, a2.detail as a2text,
        a3.id as a3id, a3.name as a3name, a3.detail as a3text 
        from pkmns 
        left join abilities as a1 on a1.id = pkmns.skill1 
        left join abilities as a2 on a2.id = pkmns.skill2 
        left join abilities as a3 on a3.id = pkmns.skill3 
        where pkmns.id = :number ';
	$query = DB::query($qstring);
	$query->bind('number', $no);
	$executed = $query->execute();
	$resultArray = $executed->as_array();

	$res = $resultArray[0];
	$this->response(array(
	    'ability1' => array(
		'id' => $res['a1id'],
		'name' =>$res['a1name'],
		'text' => $res['a1text']
	    ),
	    'ability2' => array(
		'id' => $res['a2id'],
		'name' => $res['a2name'],
		'text' => $res['a2text']
	    ),
	    'ability3' => array(
		'id' => $res['a3id'],
		'name' => $res['a3name'],
		'text' => $res['a3text']
	    )
	));
    }
    
    public function get_pkSkills($no) {
	$qstring = "
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
	$query->bind('number', $no);
	$resultArray = $query->execute()->as_array();
	$this->response($resultArray);
    }

    public function get_connect() {
	try {
	    $services_json = getenv('VCAP_SERVICES');
	    $services = json_decode($services_json, true);
	    $config = null;
	    foreach ($services as $name => $service) {
		if (0 === stripos($name, 'mysql')) {
		    $config = $service[0]['credentials'];
		    break;
		}
	    }
	    is_null($config) && die('MySQL service information not found.');

	    $this->response( $config!==null );
	    
	} catch (ErrorException $e) {
	    $this->response(array(
		'$e->getTraceAsString()' => $e->getTraceAsString(),
		'$e->getMessage()' => $e->getMessage(),
	    ));
	}
    }

    public function get_echo($msg = null) {
	$this->response(($msg === null) ? '' : $msg );
    }

    public function get_one($no = 1) {
	$one=Model_Pkmn::oneByNo($no);
	$this->response($one);	
    }

    public function get_skillname($name=""){
	$this->response(Model_Pkmn::findsBySkill($id));
    }
}

?>