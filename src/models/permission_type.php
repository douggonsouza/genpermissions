<?php

namespace douggonsouza\permission\models;

use douggonsouza\mvc\model\model;
use douggonsouza\mvc\model\modelInterface;

class permission_type extends model implements modelInterface
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