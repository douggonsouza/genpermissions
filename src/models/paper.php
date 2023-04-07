<?php

namespace douggonsouza\permission\models;

use douggonsouza\mvc\model\model;
use douggonsouza\mvc\model\modelInterface;

class paper extends model implements modelInterface
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