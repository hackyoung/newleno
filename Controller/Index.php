<?php
namespace Controller;
use \Leno\DataMapper\Table\Selector;
use \Leno\DataMapper\Table;

class Index extends App
{
    public function index()
    {
        $Entitis = (new \Model\Entity)->selector()
            ->byEqName('hello')
            ->find();
        foreach($Entitis as $en) {
            var_dump($en);
        }
        /**
        Table::deletor('hello')
            ->byEqName('hello')
            ->join(Table::deletor('world')
                ->onEqId(Table::deletor('hello')->fieldId)
                ->byLtAge(15)
            )->delete();
            **/
        /**
        Table::creator('user')
            ->setId(uuid())
            ->setName('hello')
            ->setAge(13)
            ->setCreated(date('Y-m-d H:i:s'))
        ->newRow()
            ->setId(uuid())
            ->setName('world')
            ->setAge(14)
            ->setCreated(date('Y-m-d H:i:s'))
        ->newRow()
            ->setId(uuid())
            ->setName('haha')
            ->setAge(15)
            ->setCreated(date('Y-m-d H:i:s'))
        ->create();
        **/

        /****
        Table::updator('hello')
            ->setName('name')
            ->setAge(15)
            ->byEqName('name')
            ->join(Table::updator('world')
                ->onEqId(Table::updator('hello')->fieldId)
                ->byEqName('young')
            )
            ->update();
            **/
        /**
        var_dump(
        Table::selector('user')
            ->byEqName('world')
            ->execute()
            ->fetchAll());
            **/
        /**
		Table::selector('hello')
			->field(['name', 'age', 'gendar' => 'male'])
			->byEqName('young')
			->quoteBegin()
				->byLtAge(12)
				->or()
				->byLtName('world')
			->quoteEnd()
			->byGtAge(13)
            ->join(Table::selector('world')
                ->onEqId(Table::selector('hello')->fieldId)
                ->byEqId('1')
            )
			->orderName(Selector::ORDER_DESC)
			->orderAge(Selector::ORDER_DESC)
			->groupName()
			->groupAge()
			->find();
         */
    }
}
