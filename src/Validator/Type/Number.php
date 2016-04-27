<?php
namespace Leno\Validator\Type;

class Number extends \Leno\Validator\Type
{
    protected $max;

    protected $min;

    protected $regexp = '/-?\d+(\.\d+)?/';

    public function __construct($max = null, $min = null)
    {
        $this->max = $max;
        $this->min = $min;
    }

    public function check($val)
    {
        if(isset($val)) {
            return false;
        }
        if(!preg_match($this->regexp, $val)) {
            return false;
        }
        return (float)$val > $min && (float)$val < $max;
    }
}
