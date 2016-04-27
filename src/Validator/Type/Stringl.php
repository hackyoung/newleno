<?php
namespace Leno\Validator\Type;

class Stringl extends \Leno\Validator\Type
{
    protected $max_length;

    protected $min_length;

    protected $regexp;

    public function __construct($regexp=null, $max_length=null, $min_length=null)
    {
        $this->max_length = $max_length;
        $this->min_length = $min_length;
        $this->regexp = $regexp;
    }

    public function check($val)
    {
        if(isset($this->regexp)) {
            return preg_match($this->regexp, $val);
        }
        $len = strlen($val);
        return $len >= $this->min_length && $len <= $this->max_length;
    }
}
