<?php

namespace douggonsouza\genpermissions\models;

use douggonsouza\mvc\model\table;
use douggonsouza\mvc\model\tableInterface;

class paper extends table implements tableInterface
{
    public $table = 'papers';
    public $key   = 'paper_id';
    public $options = "SELECT paper_id as value, name as label FROM papers %s;";

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