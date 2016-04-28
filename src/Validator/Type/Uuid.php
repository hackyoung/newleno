<?php
namespace Leno\Validator\Type;

class Uuid extends \Leno\Validator\Type
{
    protected $regexp = '/^[0-9a-f]{8}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{12}$/i';

    public function check($value)
    {
        parent::check($value);
        if(!preg_match($this->regexp, $value)) {
            throw new \Exception($this->value_name . ' Not A Valid UUID');
        }
        return true;
    }
}
