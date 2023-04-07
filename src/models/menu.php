<?php

namespace douggonsouza\genpermissions\models;

use douggonsouza\mvc\model\table;
use douggonsouza\mvc\model\tableInterface;

class menu extends table implements tableInterface
{
    public $table = 'menus';
    public $key   = 'menu_id';
    public $options = "SELECT menu_id as value, name as label FROM menus %s;";

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