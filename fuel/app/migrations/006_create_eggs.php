<?php

namespace Fuel\Migrations;

class Create_eggs
{
	public function up()
	{
		\DBUtil::create_table('eggs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('eggs');
	}
}