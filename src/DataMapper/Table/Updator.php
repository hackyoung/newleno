<?php
namespace Leno\DataMapper\Table;

class Updator extends \Leno\DataMapper\Table
{
	public function update($data = null)
	{
        var_dump($this->getSql());
        return $this;
	}

    public function getSql()
    {
        return sprintf('UPDATE %s %s %s WHERE %s',
            $this->getName(), $this->useData(),
            $this->useJoin(), $this->useWhere()
        );
    }

    protected function useData()
    {
        $ret = [];
        foreach($this->data as $field=>$value) {
            $ret[] = sprintf('%s = %s', 
                $this->getFieldExpr($field),
                $this->valueQuote($value)
            );
        }
        return 'SET ' . implode(', ', $ret);
    }
}
