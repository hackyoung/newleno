<?php
namespace \Leno\DataMapper\Table;

class Updator extends \Leno\DataMapper\Table
{
	public function update($data)
	{
	}

	public function execute($sql=null)
	{
		self::getDriver()->exec($sql);
	}
}
