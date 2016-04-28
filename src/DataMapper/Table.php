<?php
namespace \Leno\DataMapper;

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
        if($type == 'by') {
            $this->callBy($series, $parameters);
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
        $this->where[] = '(';
        return $this;
    }

    public function quoteEnd()
    {
        $this->where[] = ')';
        return $this;
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

    protected function handleWhere()
    {
        $where = $this->where;
        $ret = [];
        foreach($where as $item) {
            if($item === self::R_OR || $item === self::R_AND) {
                $ret[] = $item;
                continue;
            }
            $item[] = sprintf('%s %s \'%s\'', 
                $this->quote($item['field']),
                $this->expr($item['expr']),
                $item['value']
            );
        }
        return implode(' ', $ret);
    }

    private function callBy($where, $value)
    {
        $exprs = [
            'gt', 'lt', 'gte', 'lte', 'in',
        ];
        if(isset($where[0]) && $where[0] === 'not') {
            $not = true;
            array_splice($where, 0, 1);
        }
        if(!isset($where[0]) || in_array($where[0], $exprs)) {
            return false;
        }
        if($not) {
            $expr = 'not_'.$where[0];
        } else {
            $expr = $where[0];
        }
        array_splice($where, 0, 1);
        $field = implode('_', $where);
        return $this->by($expr, $field, $value);
    }

    abstract public function execute($sql);
}
