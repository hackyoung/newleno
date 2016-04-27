<?php
namespace Leno\Validator\Type;

class Ipv4 extends \Leno\Validator\Type
{
    protected $regexp = '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/';

    public function check($value)
    {
        return preg_match($this->regexp, $value);
    }
}
