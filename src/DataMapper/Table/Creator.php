<?php
namespace \Leno\DataMapper\Table;

class Creator extends \Leno\DataMapper\Table
{

	public function create($data)
	{
	}

	public function execute($sql = null)
	{
		self::getDriver()->exec($sql);
	}
}
