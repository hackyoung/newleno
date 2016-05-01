<?php
namespace Controller;
use \Leno\DataMapper\Table\Selector;
use \Leno\DataMapper\Table;

class Index extends App
{
    public function index()
    {
		/**
		$entity = new \Model\Entity;
		$entity->setName('young')
			->setAge(24)
			->setCreated(new \Datetime);
		$entity->save();
		*/

        $Entitis = \Model\Entity::find('63885eea-8b48-d25f-70f5-d5afadc0b792');
		$Entitis->setName('hello')->save();
			
		/*
		foreach($Entitis as $entity) {
			var_dump($entity->getCreated());
			var_dump($entity->isFresh());
		}
		 */
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
