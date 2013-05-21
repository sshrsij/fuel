<?php

namespace Fuel\Migrations;

class Create_personalities
{
	public function up()
	{
		\DBUtil::create_table('personalities', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'A' => array('constraint' => 11, 'type' => 'int'),
			'B' => array('constraint' => 11, 'type' => 'int'),
			'C' => array('constraint' => 11, 'type' => 'int'),
			'D' => array('constraint' => 11, 'type' => 'int'),
			'S' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('peronalities');
	}
}