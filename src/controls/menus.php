<?php

namespace douggonsouza\genpermissions\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\mvc\control\controllers;
use douggonsouza\genpermissions\models\menu;
use douggonsouza\mvc\view\views;
use douggonsouza\routes\router;

class menus extends controllers implements controllersInterface
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
        if(isset($info->POST) && $info->POST['pub_key'] == 'bWVudSBjb250cm9sbGVy'){
        
        }

        return views::view(null, $info);
    }

    public function save(propertysInterface $propertys)
    {
        $menu = new menu();
        $menu->populate($propertys->toArray());
        if(!$menu->save()){
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
        $menu = new menu($id);
        if(!$menu->exist()){
            return false;
        }

        return $menu->softDelete();
    }
}
?>