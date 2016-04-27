<?php

namespace Leno;

/**
 * 参数有效性检查，检查参数是否存在，值是否符合要求
 *
 * @example
 * $validator = new \Owl\Parameter\Validator;
 *
 * $validator->execute($vars, [
 *     'foo' => [                               // 通用配置
 *         'required' => (boolean),             // default true
 *         'allow_empty' => (boolean),          // default false
 *         'regexp' => (string),
 *         'eq' => (mixed),
 *         'same' => (mixed),
 *         'enum_eq' => [(mixed), ...],
 *         'enum_same' => [(mixed), ...],
 *         'validate' => function($value, $key, array $rule) {
 *             // ...
 *             return true;
 *         }
 *     ],
 *
 *     'foo' => [                               // 整数类型
 *         'type' => 'integer',
 *         'allow_negative' => (boolean),       // default false
 *         'allow_zero' => (boolean),           // default true
 *     ],
 *
 *     'foo' => [                               // 浮点数类型
 *         'type' => 'float',
 *         'allow_negative' => (boolean),       // default true
 *         'allow_zero' => (boolean),           // default true
 *     ],
 *
 *     'foo' => [
 *         'type' => 'ipv4',
 *     ],
 *
 *     'foo' => [
 *         'type' => 'uri',
 *     ],
 *
 *     'foo' => [
 *         'type' => 'url',
 *     ],
 *
 *     'foo' => [
 *         'type' => 'object',
 *         'instanceof' => (string),            // class name
 *     ],
 *
 *     'foo' => [
 *         'type' => 'array',                   // 普通数组
 *         'value' => [
 *             // ...
 *         ],
 *     ],
 *
 *     'foo' => [
 *         'type' => 'array',                   // hash数组
 *         'keys' => [
 *             // ...
 *         ],
 *     ],
 *
 *     'foo' => [
 *         'type' => 'array',
 *         'value' => [                         // 对数组的元素进行检查
 *             // ...
 *         ],
 *     ],
 *
 *     'foo' => [
 *         'type' => 'json',
 *         'keys' => [
 *             // ...
 *         ],
 *     ],
 *
 *     'foo' => [
 *         'type' => 'json',
 *         'value' => [
 *             // ...
 *         ],
 *     ],
 * ]);
 */
class Validator extends \Leno\Validator\Type
{
    /**
     * @var [
     *      'type' => '',
     *      'allow_empty' => true,
     *      'required' => true,
     *      'extra' => [],
     * ]
     */
    protected $rules;

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function check($value)
    {
    }

    protected function getType($value)
    {
    }
}
