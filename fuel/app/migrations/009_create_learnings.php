<?php

namespace Fuel\Migrations;

class Create_learnings
{
	public function up()
	{
		\DBUtil::create_table('learnings', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'no' => array('constraint' => 11, 'type' => 'int'),
			'lv' => array('constraint' => 11, 'type' => 'int'),
			'wayto' => array('constraint' => 20, 'type' => 'varchar'),
			'name' => array('constraint' => 20, 'type' => 'varchar'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('learnings');
	}
}