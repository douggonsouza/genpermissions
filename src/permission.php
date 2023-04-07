<?php

namespace douggonsouza\permission;

use douggonsouza\permission\controls\permissions;
use douggonsouza\permission\controls\permissions_types;
use douggonsouza\permission\controls\menus;
use douggonsouza\permission\controls\papers;

abstract class permission
{    
    /**
     * Method permissions
     *
     * @return object
     */
    static function permissions()
    {
        return new permissions();
    }
    
    /**
     * Method papers
     *
     * @return object
     */
    static function papers()
    {
        return new papers();
    }
    
    /**
     * Method menus
     *
     * @return object
     */
    static function menus()
    {
        return new menus();
    }
    
    /**
     * Method permissionsTypes
     *
     * @return object
     */
    static function permissionsTypes()
    {
        return new permissions_types();
    }
}

?>