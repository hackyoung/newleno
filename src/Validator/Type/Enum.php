<?php
namespace Leno\Validator\Type;

class Enum extends \Leno\Validator\Type
{
    protected $val_list;

    public function __construct($val_list)
    {
        $this->val_list = $val_list;
    }

    public function check($val)
    {
        return in_array($val, $this->range);
    }
}
