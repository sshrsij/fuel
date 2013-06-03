<?php

/**
 * Use this file to override global defaults.
 *
 * fuel\fuel\app\config
 * See the individual environment DB configs for specific config information.
 */
$services_json = null;
$services_json = getenv('VCAP_SERVICES');
$services = json_decode($services_json, true);
$config = null;
if (!is_null($services_json) && !is_null($services)) {
    foreach ($services as $name => $service) {
	if (0 === stripos($name, 'mysql')) {
	    $config = $service[0]['credentials'];
	    break;
	}
    }
}

/* fuel\fuel\app\config */
return array(
    'active' => ((is_null($config)) ? 'default' : 'product'),
    'product' => array(
	'type' => 'mysql',
	'profiling' => 'true',
	'charset'        => 'utf8',
	'table_prefix' => '',
	'connection' => array(
	    'database' => ((is_null($config)) ? 'dbdb' : $config["name"] ),
	    'hostname' => ((is_null($config)) ? '10.0.22.169' : $config["hostname"] ),
	    'username' => ((is_null($config)) ? 'uZ74J78Pyw8mO' : $config["user"]),
	    'password' => ((is_null($config)) ? 'puW9f8U9TtlmL' : $config["password"]),
	),
    ),
    'default' => array(
	'type' => 'mysql',
	'profiling' => 'true',
	'table_prefix' => '',
	'charset'        => 'utf8',
	'connection' => array(
	    'database' => 'dbdb',
	    'hostname' => 'localhost',
	    'username' => 'player',
	    'password' => 'Zxcvbnm,.',
	),
    ),
    'webcrow' => array(
	'type' => 'mysql',
	'profiling' => 'true',
	'table_prefix' => '',
	'connection' => array(
	    'database' => 'fulufulu_dbdb',
	    'hostname' => 'mysql1.webcrow-php.netowl.jp',
	    'username' => 'fulufulu_player@sv1.webcrow-php.netowl.jp',
	    'password' => 'b1te0ust',
	),
    ),
);
