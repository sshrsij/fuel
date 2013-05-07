<?php
/**
 * Use this file to override global defaults.
 *
 * fuel\fuel\app\config
 * See the individual environment DB configs for specific config information.
 */

/*fuel\fuel\app\config*/
return array(
		'active' => 'default',
		'default' => array(
				'type' => 'mysql',
				'profiling' => 'true',
				'table_prefix' =>'',
				'connection'  => array(
						'database'   => 'cidb',						
						'hostname'        => 'localhost',
//						'dsn'        => 'mysql:host=localhost;dbname=cidb',
						'username'   => 'test',
						'password'   => 'Zxcvbnm,',
				),
		),
		// 		'dev'=> array(
				// 				'connection'  => array(
						// 						'type' => 'mysql',
						// 						'dsn'        => 'mysql:host=localhost;dbname=cidb',
						// 						'username'   => 'test',
						// 						'password'   => 'Zxcvbnm,',
						// 				),
				// 		),
);
