<?php
namespace Leno\DataMapper\Table;

class Selector extends Table
{
    const ORDER_DESC = 'DESC';

    const ORDER_ASC = 'ASC';

    protected $group = [];

    protected $order = [];

    protected $result;

    public function __call($method, $parameters=null)
    {
        try {
            parent::__call($method, $parameters);
        } catch(\Exception $ex) {
            $series = explode('_', unCamelCase($method, '_'));
            $type = $series[0];
            array_splice($series, 0, 1);
            switch($type) {
                case 'order':
                    return $this->callOrder($series, $parameters);
                case 'group':
                    return $this->callGroup($series);
            }
        }
    }

    public function order($field, $order)
    {
        $this->order[$field] = $order;
        return $this;
    }

    public function group($field)
    {
        $this->group[] = $field;
        return $this;
    }

    public function field()
    {
    }

    public function fetch()
    {
        $sql = sprintf('SELECT %s FROM %s WHERE %s %s %s',
            '*', $this->table, $this->handleWhere(),
            $this->useGroup(), $this->useOrder(),
            $this->useLimit()
        );
        $this->execute($sql);
    }

    public function fetchAll()
    {
    }

    public function find()
    {
    }

    public function execute($sql)
    {
        $result = self::getDriver()->query($sql);
    }

    protected function useGroup()
    {
    }

    protected function useOrder()
    {
    }

    protected function useLimit()
    {
    }

    private function callGroup($series)
    {
        $field = implode('_', $series);
        return $this->group($field);
    }

    private function callOrder($series, $order)
    {
        $field = implode('_', $series);
        return $this->order($field, $order ?? self::ORDER_ASC);
    }
}
