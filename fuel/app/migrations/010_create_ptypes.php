<?php

namespace Fuel\Migrations;

class Create_ptypes
{
	public function up()
	{
		\DBUtil::create_table('ptypes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('ptypes');
	}
}