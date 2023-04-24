<?php

namespace douggonsouza\genpermissions\models;

use douggonsouza\mvc\model\table;
use douggonsouza\mvc\model\tableInterface;
use douggonsouza\genpermissions\models\menu;
use douggonsouza\genpermissions\models\paper;
use douggonsouza\genpermissions\models\permission_type;
use douggonsouza\mvc\model\resource\source;

class permission extends table implements tableInterface
{
    public $table = 'permissions';
    public $key   = 'permission_id';
    public $options = "SELECT permission_id as value, name as label FROM permissions %s;";

    const PERMISSION_TYPE_UPDATE = 'update';
    const PERMISSION_TYPE_DELETE = 'delete';
    const PERMISSION_TYPE_VIEW   = 'view';

    /**
     * options
     *
     * @return void
     */
    public function options(array $where = null)
    {
        return parent::options($where);
    }

    /**
     * pages - Modelo para o papel
     *
     * @return array|null
     */
    public function paper()
    {
        if(!$this->get('paper_id')){
            return null;
        }

        return new paper((int) $this->get('paper_id'));
    }
    
    /**
     * Method menu
     *
     * @return void
     */
    public function menu()
    {
        if(!$this->get('paper_id')){
            return null;
        }

        return new menu((int) $this->get('paper_id'));
    }
    
    /**
     * Method permissionType
     *
     * @return void
     */
    public function permissionType()
    {
        if(!$this->get('paper_id')){
            return null;
        }

        return new permission_type((int) $this->get('paper_id'));
    }

    
    /**
     * Method pages
     *
     * @param int $paperId
     *
     * @return array
     */
    public function pages(int $paperId)
    {

        if(!isset($paperId) || empty($paperId)){
            return null;
        }

        $permissionTypes = new permission_type(array(
            'name' => self::PERMISSION_TYPE_VIEW
        ));

        $sql = sprintf(
            "SELECT
                p.permission_id,
                p.code,
                p.name p_name,
                p.url,
                p.icon p_icon,
                mn.sequence_id,
                mn.name mn_name,
                mn.icon mn_icon
            FROM permissions p
            JOIN menus mn ON mn.menu_id = p.menu_id AND mn.active = 'yes'
            WHERE
                p.active = 'yes'
                AND p.permission_type_id = %d
                AND p.paper_id IN (%d)
            ORDER BY 
            	mn.sequence_id,
                p.name;",
            $permissionTypes->get('permission_type_id'),
            $paperId
        );

        return (new source($sql))->allArray();
    }

    /**
     * Get the value of table
     */ 
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }
}
?>