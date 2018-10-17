<?php

return [
	'users' => [
		'realuser' => [
			'passw' => 'rightpass',
			'name' => 'Existing User',
			'roles' => [
				'guest'
			],
			'permissions' => [
				'login'
			],
		],
	],
	'roles' => [
		'guest' => [
			'name' => 'Gast',
			'roles' => [

			],
			'users' => [

			],
			'permissions' => [

			],
		],
	],
	'permissions' => [
		'list-users' => [
			'desc' => 'see userlist',
			'roles' => [
				'admin',
				'guest' => false,
			],
			'users' => [
				'realuser'
			],
			'permissions' => [
				'send-message'
			]
		],
	],
];
