<?php
namespace Model\Entity;

class User extends \Model\Entity
{
	public static $attributes = [
		'user_id' => ['type' => 'uuid'],
		'email' => ['type' => 'string', 'extra' => ['regexp' => '']],
		'name' => ['type' => 'string', 'extra' => ['max_length' => 32]],
		'password' => ['type' => 'string', 'extra' => ['max_length' => 32]],
		'portrait' => ['type' => 'string', 'required' => false],
		'age' => ['type' => 'integer', 'required' => false],
		'created' => ['type' => 'datetime'],
		'updated' => ['type' => 'datetime', 'required' => false],
		'deleted' => ['type' => 'datetime', 'required' => false]
	];

	public static $primary = 'user_id';

	public static $unique = ['email'];

	public static $table = 'user';

	public static $foreign = [
		'orders' => [
			'class' => '/Model/Order',
			'local' => 'user_id',
			'foreign' => 'user_id',
		],
		'techs' => [
			'class' => '/Model/Tech',
			'local' => 'tech_id',
			'foreign' => 'tech_id',
			'next' => [
				'class' => '/Model/User/Tech',
				'local' => 'user_id',
				'foreign' => 'user_id',
			]
		],
		'tasks' => [
			'class' => '/Model/Task',
			'local' => 'user_id',
			'foreign' => 'user_id'
		]
	];
}
