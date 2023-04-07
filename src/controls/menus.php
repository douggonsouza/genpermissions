<?php

namespace douggonsouza\permission\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\permission\models\menu;

class menus
{
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