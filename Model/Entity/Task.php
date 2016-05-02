<?php
namespace Model\Entity;

class Task extends \Model\Entity
{
	public static $attributes = [
		'task_id' => ['type' => 'uuid'],
		'title' => ['type' => 'string', 'extra' => ['max_length' => 64]],
		'description' => ['type' => 'string', 'required' => false, 'extra' => ['max_length' => 256]],
		'requirement' => ['type' => 'string', 'extra' => ['max_length' => 128]],
		'min_price' => ['type' => 'integer', 'extra' => ['min' => 0]],
		'max_price' => ['type' => 'integer', 'extra' => ['min' => 0]],
		'needed' => ['type' => 'integer', 'extra' => ['min' => 0]],
		'creator_id' => ['type' => 'uuid'],
		'cat_id' => ['type' => 'uuid'],
		'created' => ['type' => 'datetime'],
		'updated' => ['type' => 'datetime', 'required' => false],
		'deleted' => ['type' => 'datetime', 'required' => false]
	];

	public static $table = 'task';

	public static $primary = 'task_id';

	public static $foreign = [
		'creator' => [
			'class' => '/Model/User',
			'local' => 'user_id',
			'foreign' => 'creator_id',
		],
		'category' => [
			'class' => '/Model/Category',
			'local' => 'cat_id',
			'foreign' => 'cat_id',
		]
	];
}
