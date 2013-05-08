<?php

namespace Fuel\Migrations;

class Create_pkmns
{
	public function up()
	{
		\DBUtil::create_table('pkmns', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'no' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'H' => array('constraint' => 11, 'type' => 'int'),
			'A' => array('constraint' => 11, 'type' => 'int'),
			'B' => array('constraint' => 11, 'type' => 'int'),
			'C' => array('constraint' => 11, 'type' => 'int'),
			'D' => array('constraint' => 11, 'type' => 'int'),
			'S' => array('constraint' => 11, 'type' => 'int'),
			'Total' => array('constraint' => 11, 'type' => 'int'),
			'type1' => array('constraint' => 11, 'type' => 'int'),
			'type2' => array('constraint' => 11, 'type' => 'int' ,'null' => true),
			'skill1' => array('constraint' => 11, 'type' => 'int'),
			'skill2' => array('constraint' => 11, 'type' => 'int' ,'null' => true),
			'skill3' => array('constraint' => 11, 'type' => 'int' ,'null' => true),
			'egg1' => array('constraint' => 11, 'type' => 'int'),
			'egg2' => array('constraint' => 11, 'type' => 'int' ,'null' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pkmns');
	}
}