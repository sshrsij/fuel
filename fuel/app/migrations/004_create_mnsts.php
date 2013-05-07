<?php

namespace Fuel\Migrations;

class Create_mnsts
{
	public function up()
	{
		\DBUtil::create_table('mnsts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'no' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'H' => array('constraint' => 11, 'type' => 'int'),
			'A' => array('constraint' => 11, 'type' => 'int'),
			'B' => array('constraint' => 11, 'type' => 'int'),
			'C' => array('constraint' => 11, 'type' => 'int'),
			'D' => array('constraint' => 11, 'type' => 'int'),
			'S' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('mnsts');
	}
}