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
			->quoteBegin()
				->byLtAge(12)
				->or()
				->byLtName('world')
			->quoteEnd()
			->byGtAge(13)
			->orderName(Selector::ORDER_DESC)
			->orderAge(Selector::ORDER_DESC)
			->join(Table::selector('world')
				->field()
				->byEqId(Table::selector('hello')->fieldId)
			)
			->groupName()
			->groupAge()
			->fetch();
    }
}
