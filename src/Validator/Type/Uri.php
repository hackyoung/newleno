<?php
namespace Leno\Validator\Type;

class Uri extends \Leno\Validator\Type
{
    protected $regexp = '#^/(?:[^?]*)?(?:\?[^\#]*)?(?:\#[0-9a-z\-\_\/]*)?$#';

    public function check($value)
    {
        return preg_match($this->regexp, $value);
    }
}
