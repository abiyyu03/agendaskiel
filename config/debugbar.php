<?php
return [
	'storage' => [
	    'enabled'    => true,
	    'driver'     => 'custom', // redis, file, pdo, custom
	    'provider'   => \App\SocketStorage::class, // Instance of StorageInterface for custom driver
	],
];
