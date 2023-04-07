<?php

namespace douggonsouza\genpermissions\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\genpermissions\models\permission;
use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\control\controllersInterface;

class permissions extends controllers implements controllersInterface
{
    /**
     * Method main
     *
     * @param propertysInterface $info 
     *
     * @return void
     */
    public function main(propertysInterface $info = null)
    {
        return self::view(null, $info);
    }

    /**
     * Method save
     *
     * @param propertysInterface $propertys
     *
     * @return bool
     */
    public function save(propertysInterface $propertys)
    {
        $permission = new permission();
        $permission->populate($propertys->toArray());
        if(!$permission->save()){
            return false;
        }

        return true;
    }
    
    /**
     * Method get
     *
     * @param int $paperId
     *
     * @return array
     */
    public function get(int $paperId)
    {
        $permissions = (new permission())->search(array('paper_id' => $paperId));
        if(!$permissions->exist()){
            return false;
        }

        return $permissions->asAllArray();
    }

    /**
     * Method get
     *
     * @param int $paperId
     *
     * @return array
     */
    public static function pages(int $paperId)
    {
        return (new permission())->pages($paperId);
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
        $permission = new permission($id);
        if(!$permission->exist()){
            return false;
        }

        return $permission->softDelete();
    }
}
?>