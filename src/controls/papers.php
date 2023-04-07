<?php

namespace douggonsouza\genpermissions\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\genpermissions\models\paper;

class papers
{
    public function save(propertysInterface $propertys)
    {
        $paper = new paper();
        $paper->populate($propertys->toArray());
        if(!$paper->save()){
            return false;
        }

        return true;
    }

    /**
     * Method delete
     *
     * @param string $id
     *
     * @return bool
     */
    public function delete(string $id)
    {
        $paper = new paper($id);
        if(!$paper->exist()){
            return false;
        }

        return $paper->sofDelete();
    }
}
?>