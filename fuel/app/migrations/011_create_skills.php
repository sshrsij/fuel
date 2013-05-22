<?php

namespace Fuel\Migrations;

class Create_skills
{
	public function up()
	{
		\DBUtil::create_table('skills', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 20, 'type' => 'varchar'),
			'power' => array('constraint' => 11, 'type' => 'int'),
			'hit' => array('constraint' => 11, 'type' => 'int'),
			'pp' => array('constraint' => 11, 'type' => 'int'),
			'ptype' => array('constraint' => 11, 'type' => 'int'),
			'skilltype' => array('constraint' => 10, 'type' => 'varchar'),
			'touch' => array('constraint' => 11, 'type' => 'int'),
			'range' => array('constraint' => 50, 'type' => 'varchar'),
			'effect' => array('constraint' => 11, 'type' => 'int'),
			'memo' => array('type' => 'text'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('skills');
	}
}