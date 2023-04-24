<?php

namespace douggonsouza\genpermissions\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\propertys\propertys;
use douggonsouza\genpermissions\models\permission;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\view\views;
use douggonsouza\routes\router;
use douggonsouza\genpermissions\models\permission_type;
use douggonsouza\genpermissions\models\paper;
use douggonsouza\genpermissions\models\menu;

class permissions extends controllers implements controllersInterface
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
        if(isset($info->POST) && $info->POST['pub_key'] == 'cGVybWlzc2lvbiBjb250cm9sbGVy'){
        
        }

        $props = new propertys((array) $info);
        $props->add(array(
            'optionsPermissionType' => (new permission_type())->options(),
            'optionsPaper' => (new paper())->options(),
            'optionsMenu' => (new menu())->options()
        ));
        return views::view(null, $props);
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