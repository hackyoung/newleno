<?php
namespace Controller;
use \Leno\DataMapper\Table\Selector;
use \Leno\DataMapper\Table;
class Index extends App
{
    public function index()
    {
		Table::selector('hello')
			->field(['name', 'age', 'gendar' => 'male'])
			->byEqName('young')
			->byGtAge(13)
			->order('name', Selector::ORDER_DESC)
			->order('age', Selector::ORDER_DESC)
			->groupName()
			->fetch();
    }
}
