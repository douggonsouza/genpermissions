<?php

namespace douggonsouza\genpermissions\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\genpermissions\models\paper;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\view\views;
use douggonsouza\routes\router;

class papers extends controllers implements controllersInterface
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
        if(isset($info->POST) && $info->POST['pub_key'] == 'cGFwZXIgY29udHJvbGxlcg=='){
        
        }

        return views::view(null, $info);
    }
    
    /**
     * Method save
     *
     * @param propertysInterface $propertys [explicite description]
     *
     * @return void
     */
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
    // public function delete(string $id)
    // {
    //     $paper = new paper($id);
    //     if(!$paper->exist()){
    //         return false;
    //     }

    //     return $paper->sofDelete();
    // }
}
?>