<?php
namespace Leno\DataMapper;

/**
 *
 *   self::selector()
 *       ->quoteBegin()
 *           ->byEqHello('hello')
 *           ->or()
 *           ->byEqWorld('world')
 *       ->quoteEnd()->find();
 */
abstract class Table
{
    const R_OR = 'OR'; 

    const R_AND = 'AND';

	const EXP_QUOTE_BEGIN = '(';

	const EXP_QUOTE_END = ')';

    protected $table;

    protected $where = [];

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function __call($method, $parameters=null)
    {
        $series = explode('_', unCamelCase($method, '_'));
        if(!isset($series[0])) {
            throw new \Exception(get_class() . '::' . $method . ' Not Found');
        }
        $type = $series[0];
        array_splice($series, 0, 1);
        if($type == 'by' && $ret = $this->callBy($series, $parameters)) {
           return $ret;
        }
        throw new \Exception(get_class() . '::' . $method . ' Not Found');
    }

    public function by($expr, $field, $value)
    {
        if(count($this->where) > 1) {
            $top = $this->where[count($this->where) - 1];
            if($top !== self::R_OR && $top !== self::R_AND) {
                $this->and();
            }
        }
        $this->where[] = [
            'expr' => $expr,
            'field' => $field,
            'value' => $value,
        ];
        return $this;
    }

    public function or()
    {
        $this->where[] = self::R_OR;
        return $this;
    }

    public function and()
    {
        $this->where[] = self::R_AND;
        return $this;
    }

    public function quoteBegin()
    {
        $this->where[] = self::EXP_QUOTE_BEGIN;
        return $this;
    }

    public function quoteEnd()
    {
        $this->where[] = self::EXP_QUOTE_END;
        return $this;
    }

	public function quote($str)
	{
		return '`'.$str.'`';
	}

    public static function selector($table)
    {
        return new \Leno\DataMapper\Table\Selector($table);
    }

    public static function creator($table)
    {
        return new \Leno\DataMapper\Table\Creator($table);
    }

    public static function deletor($table)
    {
        return new \Leno\DataMapper\Table\Deletor($table);
    }

    public static function updator($table)
    {
        return new \Leno\DataMapper\Table\Updator($table);
    }

    public static function getDriver()
    {
    }

    protected function useWhere()
    {
        $where = $this->where;
        $ret = [];
		$eq_arr = [
			self::EXP_QUOTE_BEGIN,
			self::EXP_QUOTE_END,
			self::R_OR,
			self::R_AND,
		];
        foreach($where as $item) {
			if(in_array($item, $eq_arr)) {
				$ret[] = $item;
				continue;
			}
			$ret[] = $this->expr($item);
        }
        return implode(' AND ', $ret);
    }

	private function expr($item)
	{
		$like = [
			'like' => 'LIKE', 'not_like' => 'NOT LIKE',
		];
		$in = [
			'in' => '', 'not_in' => '',
		];
		$expr = [
			'eq' => '=', 'not_eq' => '!=', 'gt' => '>',
			'lt' => '<', 'gte' => '>=', 'lte' => '<=',
		];
		if(isset($like[$item['expr']])) {
			return sprintf('%s %s %%s%', 
				$this->quote($this->table) .'.'. $this->quote($item['field']),
				$like[$item['expr']],
				$item['value']
			);
		}
		if(isset($in[$item['expr']])) {
			return '';
		}
		if(isset($expr[$item['expr']])) {
			return sprintf('%s %s \'%s\'', 
				$this->quote($this->table) . '.' . $this->quote($item['field']),
				$expr[$item['expr']],
				$item['value']
			);
		}
		throw new \Exception($item['expr'] . ' Not Supported');
	}

    private function callBy($where, $value)
    {
        $exprs = [
            'gt', 'lt', 'gte', 'lte', 'in', 'eq'
        ];
        if(isset($where[0]) && $where[0] === 'not') {
            $not = true;
            array_splice($where, 0, 1);
		} else {
			$not = false;
		}
        if(!isset($where[0]) || !in_array($where[0], $exprs)) {
			return false;
        }
        if($not) {
            $expr = 'not_'.$where[0];
        } else {
            $expr = $where[0];
        }
        array_splice($where, 0, 1);
        $field = implode('_', $where);
        return $this->by($expr, $field, $value[0]);
    }

    abstract public function execute($sql);
}
