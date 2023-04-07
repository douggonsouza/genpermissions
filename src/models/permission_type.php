<?php

namespace douggonsouza\genpermissions\models;

use douggonsouza\mvc\model\table;
use douggonsouza\mvc\model\tableInterface;
class permission_type extends table implements tableInterface
{
    public $table = 'permissions_types';
    public $key   = 'permission_type_id';
    public $options = "SELECT permission_type_id as value, name as label FROM permissions_types %s;";

    /**
     * options
     *
     * @return void
     */
    public function options(array $where = null)
    {
        return parent::options($where);
    }

    /**
     * Get the value of table
     */ 
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }
}
?>