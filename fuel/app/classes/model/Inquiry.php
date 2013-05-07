<?php
use Orm\Model;

class Model_Inquiry extends Model
{
	protected static $_properties = array(
			'id',
			'externalID',
			'customercompany',
			'customerperson',
			'owner',
			'date',
			'title',
	);
	public static function findByName($param) {		
		$str = mb_convert_encoding($param, "utf-8");
		$where=array(array('owner','LIKE',"%".$str."%"));
		$conditions['where']=$where;
		$conditions['limit']=5;
		return \Model_Inquiry::find('all',$conditions);
	}
	public static function findByCompany($param) {
		$str = mb_convert_encoding($param, "utf-8");
		$where=array(array('customercompany','LIKE',"%".$str."%"));
		$conditions['where']=$where;
		$conditions['limit']=5;
		return \Model_Inquiry::find('all',$conditions);
	}	
	protected static function filter($where)
	{
		$conditions['where']=$where;
		$conditions['limit']=50;
		return \Model_Inquiry::find('all',$conditions);
	}
	
}
