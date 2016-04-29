<?php
namespace Leno\DataMapper;

class Mapper
{
    /**
     * @var [
     *      'name' => ['type' => 'string', 'extra' => ['max_length' => 2015]],
     *      'age' => ['type' => 'integer', 'allow_empty' => true,],
     * ];
     */
    protected $attributes = [];

    /**
     * @var [
     *      'id', 'name'
     * ]
     */
    protected static $unique = [];

    protected static $primary;

    protected $table;

    protected $data;

    public function __construct($data = [])
    {
        $this->data = new Data($data, $this->attributes);
    }

    public function get($key)
    {
        $this->data->get($key);
    }

    public function set($key, $val)
    {
        $this->data->set($key, $val);
    }

    public function isFresh()
    {
        $pks = self::getPrimaries();
        foreach($pks as $pk) {
            if(!$this->data->isset($pk)) {
                return true;
            }
        }
        return false;
    }

    public function save()
    {
        $pks = $this->getPrimaries();
        if(!$this->isFresh()) {
            $updator = self::updator();
            foreach(self::getPrimaries() as $k) {
                $updator->by('eq', $k, $this->data->get($k));
            }
            $this->data->each(function($key, $data) {
                $updator->set($key, $data->get($key));
            });
            return $updator->update();
        }
        $creator = self::creator();
        $this->data->each(function($key, $data) {
            if(!$data->isDirty()) {
                return;
            }
            if($this->isPk($key) && !$this->data->isset($key) && 
                                $this->attributes[$key]['type'] == 'uuid') {
                $creator->set($key, uuid());
                return;
            }
            $creator->set($key, $data->get($key));
        });
        return $creator->create();
    }

    public function getPk()
    {
        $pks_value = [];
        foreach($this->getPrimaries() as $k) {
            $pks_value[$k] = $this->data->get($k);
        }
        return $pks_value;
    }

    public static function getPrimaries()
    {
        return self::unique;
    }

    public static function find($pk)
    {
        if(!$this->isPk($pk)) {
            throw new \Exception('Primary Key Error');
        }
        foreach($pk as $field => $value) {
            self::selector()->by('eq', $field, $value);
        }
        return self::selector()->findOne();
    }

    public static function findOrFail($pk)
    {
        $entity = self::find($pk);
        if(!$entity instanceof self) {
            throw new \Exception('Entity Not Found');
        }
        return $entity;
    }

    public function isPk($pk)
    {
        return true;
    }

    public function deletor()
    {
        return \Leno\DataMapper\Table::creator($this->table)
            ->setMapper($this);
    }

    public function updator()
    {
        return \Leno\DataMapper\Table::updator($this->table)
            ->setMapper($this);
    }

    public function creator()
    {
        return \Leno\DataMapper\Table::creator($this->table)
            ->setMapper($this);
    }

    public function selector()
    {
        return \Leno\DataMapper\Table::selector($this->table)
            ->setMapper($this);
    }
}
