<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
		'active' => 'dev',		
		'default' => array(
				'connection'  => array(
						'dsn'        => 'mysql:host=localhost;dbname=cidb',
						'username'   => 'root',
						'password'   => 'b1te0ust',
				),
		),
		'dev'=> array(
				'connection'  => array(
						'type'		 => 'mysql',
						'dsn'        => 'mysql:host=localhost;dbname=cidb',
						'username'   => 'test',
						'password'   => 'Zxcvbnm,',
				),
		),
);
