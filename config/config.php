<?php

return array( 
	
	'migrations_table' => 'migrations',

	'default_connection' => 'mysql',

	'migrations_path'	=> BASE_PATH . '/migrations',

	'connections' => array(
		'mysql' => array(
		    'driver'    => 'mysql',
		    'host'      => 'localhost',
		    'database'  => 'database',
		    'username'  => 'root',
		    'password'  => 'root',
		    'prefix'    => '',
		    'charset'   => "utf8",
		    'collation' => "utf8_unicode_ci"
		),
	),
);