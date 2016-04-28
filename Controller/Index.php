<?php
namespace Controller;
class Index extends App
{
    public function index()
    {
        $validator = new \Leno\Validator([
            'type' => 'array',
            'allow_empty' => false,
            '__each__' => [
                'type' => 'array',
                'extra' => [
                    'min' => ['type' => 'int'],   
                    'max' => ['type' => 'int'],
                    'test_enum' => [
                        'type' => 'enum',
                        'extra' => ['enum_list' => ['1', '2', '3']],
                        'onError' => function($value, $rule, $ex) {
                            echo "<pre>";
                            var_dump($value);
                            var_dump($rule);
                        }
                    ],
                    'in' => [
                        'type' => 'array',
                        'extra' => [
                            'hello' => [
                                'type' => 'string',
                                'extra' => ['regexp' => '/^\d+$/']
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        $test = [
            ['min' => 1, 'max' => 2, 'test_enum'=> 5, 'in' => ['hello' => '111']],
            ['min' => 2, 'max' => 3, 'in' => ['hello' => '123fjakl']]
        ];
        $validator->check($test);
    }
}
