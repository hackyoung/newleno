<?php
namespace Leno\DataMapper\Table;

class Selector extends \Leno\DataMapper\Table
{
    const ORDER_DESC = 'DESC';

    const ORDER_ASC = 'ASC';

	const JOIN_LEFT = 'LEFT_JOIN';

	const JOIN_INNER = 'INNER_JOIN';

	const JOIN_RIGHT = 'RIGHT_JOIN';

	const JOIN_OUTER = 'OUTER_JOIN';

    protected $group = [];

    protected $order = [];

	protected $field = [];

	protected $joins = [];

	protected $limit = [];

    protected $result;

    public function __call($method, $parameters=null)
    {
        try {
            return parent::__call($method, $parameters);
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
        	throw new \Exception(get_class() . '::' . $method . ' Not Found');
        }
    }

	public function join($selector, $type = self::JOIN_LEFT)
	{
		$this->joins[] = [
			'selector' => $selector,
			'type' => $type,
		];
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

    public function field($field, $alias=false)
    {
		if(is_array($field)) {
			$new_field = [];
			foreach($field as $k => $v) {
				if(is_int($k)) {
					$new_field[$v] = false;
					continue;
				}
				$new_field[$k] = $v;
			}
			$this->field = array_merge($this->field, $new_field);
			return $this;
		}
		if(is_string($field)) {
			$this->field[$field] = $alias;
			return $this;
		}
		throw new \Exception('Field Type Not Surpported');
    }

	public function limit($row, $limit = -1)
	{
		$this->limit = [
			'row' => $row,
			'limit' => $limit,
		];
		return $this;
	}

	public function getFeild()
	{
		if(empty($this->field)) {
			return [$this->quote($this->table).'.'.'*'];
		}
		$ret = [];
		foreach($this->field as $field=>$alias) {
			$f = implode('.', [
				$this->quote($this->table), $this->quote($field)
			]);
			if($alias) {
				$f .= ' AS ' . $alias;
			}
			$ret[] = $f;
		}
		return $ret;
	}

	public function getGroup()
	{
		return array_map(function($field) {
			return $this->quote($this->table) . '.' .$this->quote($field);
		}, $this->group);
	}

	public function getOrder()
	{
		$ret = [];
		foreach($this->order as $field=>$order) {
		
			$ret[] = $this->quote($this->table) . '.' .$this->quote($field) . ' ' . $order;
		}
		return $ret;
	}

    public function fetch()
    {
        $sql = sprintf('SELECT %s FROM %s %s WHERE %s %s %s',
			$this->useField(), $this->quote($this->table),
			$this->useJoin(), $this->useWhere(), $this->useGroup(), 
			$this->useOrder(), $this->useLimit()
        );
        $this->execute($sql);
		return $this;
    }

    public function fetchAll()
    {
    }

    public function find()
    {
    }

    public function execute($sql)
    {
		echo $sql;
    //    $result = self::getDriver()->query($sql);
    }

	protected function useField()
	{
		$fields = $this->getFeild();
		foreach($this->joins as $join) {
			$fields = array_merge($fields, $join['selector']->getFeild());
		}
		return implode(', ', $fields);
	}

    protected function useGroup()
    {
		$group_fields = $this->getGroup();
		foreach($this->joins as $join) {
			$group_fields = array_merge($group_fields, $join['selector']->getGroup());
		}
		if(count($group_fields) > 0) {
			return 'GROUP BY '. implode(', ', $group_fields);
		}
		return '';
    }

    protected function useOrder()
    {
		$order_fields = $this->getOrder();
		foreach($this->joins as $join) {
			$order_fields = array_merge($order_fields, $join['selector']->getOrder());
		}
		if(count($order_fields) > 0) {
			return 'ORDER BY ' . implode(', ', $order_fields);
		}
		return '';
    }

    protected function useLimit()
    {
    }

	protected function useJoin()
	{
		$map = [
			self::JOIN_INNER => 'INNER JOIN',
			self::JOIN_LEFT => 'LEFT JOIN',
			self::JOIN_RIGHT => 'RIGHT JOIN',
			self::JOIN_OUTER => 'OUTER JOIN',
		];
		$ret = [];
		foreach($this->joins as $join) {
			$ret[] = sprintf('%s %s ON %s', 
				$map[$join['type']],
				$join['selector']->table,
				$join['selector']->useWhere()
			);
		}
		return implode(' ', $ret);
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
