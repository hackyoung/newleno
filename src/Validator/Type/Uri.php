<?php
namespace Leno\Validator\Type;

class Uri extends \Leno\Validator\Type
{
    protected $regexp = '#^/(?:[^?]*)?(?:\?[^\#]*)?(?:\#[0-9a-z\-\_\/]*)?$#';

    public function check($value)
    {
        if(!parent::check($value)) {
            return true;
        }
        if(!preg_match($this->regexp, $value)) {
            throw new \Exception($this->value_name . ' Not A Valid Uri');
        }
        return true;
    }
}
