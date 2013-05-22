<?php

namespace Fuel\Migrations;

class Create_abilities
{
	public function up()
	{
		\DBUtil::create_table('abilities', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'detail' => array('type' => 'text'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('abilities');
	}
}