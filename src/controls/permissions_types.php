<?php

namespace douggonsouza\genpermissions\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\genpermissions\models\genpermissions_type;

class permissions_types
{
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