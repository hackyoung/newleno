<?php
namespace Leno\Validator\Type;

class Url extends \Leno\Validator\Type
{
    protected $regexp = '#^[a-z]+://[0-9a-z\-\.]+\.[0-9a-z]{1,4}(?:\d+)?(?:/[^\?]*)?(?:\?[^\#]*)?(?:\#[0-9a-z\-\_\/]*)?$#';

    public function check($value)
    {
        return preg_match($this->regexp, $value);
    }
}
