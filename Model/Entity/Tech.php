<?php
namespace Model\Entity;

class Tech extends \Model\Entity
{
	public static $attributes = [
		'tech_id' => ['type' => 'uuid'],
		'label' => ['type' => 'string', 'extra' => ['max_length' => 32]],
		'description' => ['type' => 'string', 'required' => false, 'extra' => ['max_length' => 256]],
		'url' => ['type' => 'url', 'required' => false, 'extra' => ['max_length' => 1024]],
		'hot' => ['type' => 'integer', 'extra' => ['min' => 0]],
		'created' => ['type' => 'datetime'],
		'updated' => ['type' => 'datetime', 'required' => false],
		'deleted' => ['type' => 'datetime', 'required' => false]
	];

	public static $unique = ['label'];

	public static $table = 'tech';

	public static $primary = 'tech_id';
}
