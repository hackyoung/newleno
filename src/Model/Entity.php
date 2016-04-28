<?php
namespace \Leno\Model;

class Entity
{
    protected static $attributes = [];

    protected static $pks;

    protected $table;

    protected $data;

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
            self::table()->updator()->byPks($this->getPks())
                ->update($this->data);
            return;
        }
        foreach($pks as $pk) {
            if(!$this->data->isset($pk) && 
                $this->data->getConfig($pk)['type'] == 'uuid') {
                $this->data->set($pk, uuid());
            }
        }
        self::table()->creator->create($this->data);
    }

    public function getPks()
    {
        $pks_value = [];
        foreach($this->getPrimaries() as $k) {
            $pks_value[$k] = $this->data->get($k);
        }
        return $pks_value;
    }

    public static function getPrimaries()
    {
        if(!self::$pks) {
            foreach(self::attributes as $field=>$conf) {
                if(isset($conf['primary_key']) && $conf['primary_key']) {
                    $pks[] = $field;
                }
            }
            self::$pks = $pks;
        }
        return self::$pks;
    }

    public static function find($pk)
    {
        if(!$this->isPk($pk)) {
            throw new \Exception('Primary Key Error');
        }
        return self::table()->selector()->findPk($pk);
    }

    public static function findOrFail($pk)
    {
        $entity = self::find($pk);
        if(!$entity instanceof self) {
            throw new \Exception('Entity Not Found');
        }
        return $entity;
    }

    public static function isPk($pk)
    {
        return true;
    }

    public static function table()
    {
        return \Leno\DataMapper\Table::get($this->table);
    }
}
