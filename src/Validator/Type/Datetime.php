<?php
namespace Leno\Validator\Type;

class Datetime extends \Leno\Validator\Type
{
    protected $regexp = '/^\d{4}(-\d{1,2}){2} \d{1,2}(:\d{1,2}){1,2}$/';

    public function check($val) {
        if(!parent::check($val) ) {
            return true;
        }
        if(!preg_match($this->regexp, $val)) {
            throw new \Exception($this->value_name . ' Not A Valid Datetime');
        }
        return true;
    }
}
