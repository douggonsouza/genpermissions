<?php

namespace douggonsouza\permission\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\propertys\propertys;
use douggonsouza\permission\models\permission as permissionModel;
use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\logged\logged;
use douggonsouza\logged\models\user;
use douggonsouza\permission\permission;
use douggonsouza\mvc\view\views;

class sidebar extends controllers implements controllersInterface
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
        $pages = null;
        
        $id = logged::getId();
        if(isset($id)){
            $user = new user((int) logged::getId());
            $perfil = $user->perfil();
            // views permissions
            $pages = permission::permissions()::pages((int) $perfil['paper_id']);
        }
        
        return views::view('',new propertys(array('pages' => $pages)) );
    }

}
?>