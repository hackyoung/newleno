<?php
namespace Leno\Validator\Type;

class Uuid extends \Leno\Validator\Type
{
    protected $regexp = '/^[0-9a-f]{8}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{12}$/i';

    public function check($value)
    {
        return preg_match($this->regexp, $value);
    }
}
