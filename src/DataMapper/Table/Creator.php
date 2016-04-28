<?php
namespace \Leno\DataMapper\Table;

class Selector extends \Leno\DataMapper\Table
{
    public function __call($method, $parameters = null)
    {
        $exp = [
            'eq', 'gt', 'lt', 'gte', 'lte', 'in',
            'not_eq', 'not_gt', 'not_lt', 'not_gte',
            'not_in', 'not_lte'
        ];
        $method = unComelCase($method, '_');
        $series = array_filter(explode('_', $method));
        if($series[0] && $series[0] == 'by' && $series[1] && in_array($series[1], $exp)) {
            $e = $series[1];
            array_splice($series, 0, 2);
            $field = implode('_', $series);
            return $this->by($e, $field, $parameters);
        }
        throw new \Exception($method . ' Not Defined');
    }

    public function byPks()
    {
    }

    public function by($exp, $field, $value)
    {
    }

    public function group()
    {
    }

    public function order() 
    {
    }
}
