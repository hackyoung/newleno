<?php
namespace Model\Entity;

class Order extends \Model\Entity
{
	public static $attributes = [
		'order_id' => ['type' => 'uuid'],
		'task_id' => ['type' => 'uuid'],
		'amount' => ['type' => 'integer', 'extra' => [
			'min' => 0,
		]],
		'boss_id' => ['type' => 'uuid'],
		'worker_id' => ['type' => 'uuid'],
		'progress' => ['type' => 'integer', 'extra' => [
			'min' => 0, 'max' => 100,
		]],
		'worker_deposit' => ['type' => 'integer', 'extra' => [
			'min' => 0,
		]],
		'boss_deposit' => ['type' => 'integer', 'extra' => [
			'min' => 0,
		]],
		'done' => ['type' => 'datetime', 'required' => false],
		'created' => ['type' => 'datetime'],
		'updated' => ['type' => 'datetime', 'required' => false],
		'deleted' => ['type' => 'datetime', 'required' => false]
	];

	public static $table = 'order';

	public static $primary = 'order_id';

	public static $foreign = [
		'boss' => [
			'class' => '\Model\User',
			'local' => 'user_id',
			'foreign' => 'boss_id',
		],
		'worker' => [
			'class' => '\Model\User',
			'local' => 'user_id',
			'foreign' => 'worker_id',
		],
		'task' => [
			'class' => '\Model\Task',
			'local' => 'task_id',
			'foreign' => 'task_id',
		]
	];
}
