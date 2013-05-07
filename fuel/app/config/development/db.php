<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(	
		'active' => 'dev',
		'default' => array(
				'type' 			=> 'mysql',
				'profiling'		=> 'false',
				'table_prefix' =>'',
				'connection'  => array(
						'database'		=> 'cidb',
						'hostname' 	=> 'localhost',
						'dsn'        => 'mysql:host=localhost;dbname=cidb',
						'username'   => 'root',
						'password'   => 'b1te0ust',
				),
		),
		'dev' => array(
				'type' 			=> 'mysql',
				'profiling'		=> 'true',
				'table_prefix' =>'',
				'connection'	=> array(
						'database'		=> 'cidb',
						'hostname' 	=> 'localhost',
						'username'	=> 'test',
						'password'		=> 'Zxcvbnm,',
				),
		),
);