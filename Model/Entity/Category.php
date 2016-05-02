<?php
namespace Model\Entity;

class Category extends \Model\Entity
{
	public static $attributes = [
		'cat_id' => ['type' => 'uuid'],
		'label' => ['type' => 'string', 'extra' => ['min_length' => 64]],
		'created' => ['type' => 'datetime'],
		'updated' => ['type' => 'datetime', 'required' => false],
		'deleted' => ['type' => 'datetime', 'required' => false]
	];

	public static $table = 'category';

	public static $primary = 'cat_id';

	public static $unique = ['label'];
}
