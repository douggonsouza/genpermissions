<?php

namespace douggonsouza\genpermissions\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\genpermissions\models\permission_type;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\view\views;
use douggonsouza\routes\router;

class permissions_types extends controllers implements controllersInterface
{
    /**
     * Method main
     *
     * @param propertysInterface $info [explicite description]
     *
     * @return void
     */
    public function main(propertysInterface $info = null)
    {
        if(isset($info->POST) && $info->POST['pub_key'] == 'cGVybWlzc2lvbiB0eXBlIGNvbnRyb2xsZXI='){
        
        }

        return views::view(null, $info);
    }

    public function save(propertysInterface $propertys)
    {
        $permissionType = new permission_type();
        $permissionType->populate($propertys->toArray());
        if(!$permissionType->save()){
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
        $permissionType = new permission_type($id);
        if(!$permissionType->exist()){
            return false;
        }

        return $permissionType->softDelete();
    }
}
?>