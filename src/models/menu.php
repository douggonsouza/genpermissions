<?php

namespace douggonsouza\permission\models;

use douggonsouza\mvc\model\model;
use douggonsouza\mvc\model\modelInterface;

class menu extends model implements modelInterface
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