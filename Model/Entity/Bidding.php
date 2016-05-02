<?php
namespace Model\Entity;

class Bidding extends \Model\Entity
{
	public static $attributes = [
		'bid_id' => ['type' => 'uuid'],
		'task_id' => ['type' => 'uuid'],
		'user_id' => ['type' => 'uuid'],
		'price' => ['type' => 'integer', 'extra' => [
			'min' => 0
		]],
		'needed' => ['type' => 'integer', 'extra' => [
			'min' => 0
		]],
		'message' => ['type' => 'string', 'extra' => [
			'max_length' => 256
		]],
		'status' => ['type' => 'enum', 'extra' => [
			'enum_list' => ['init','preorder','ordered']
		]],
		'created' => ['type' => 'datetime'],
		'updated' => ['type' => 'datetime', 'required' => false],
		'deleted' => ['type' => 'datetime', 'required' => false]
	];

	public static $table = 'bidding';

	public static $primary = 'bid_id';

	public static $unique = ['task_id', 'user_id'];

	public static $foreign = [
		'task' => [
			'class' => '\Model\Task',
			'local' => 'task_id',
			'foreign' => 'task_id',
		],
		'user' => [
			'class' => '\Model\User',
			'local' => 'user_id',
			'foreign' => 'user_id'
		]
	];
}
