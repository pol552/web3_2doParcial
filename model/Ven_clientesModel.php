<?php
require_once('../core/ModelBasePDO.php');
class Ven_clientesModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll()
    {
        $sql = "SELECT id, nombre, tipo, marca, precio, cantidad, proveedor, codigo_barra
          FROM equipos_para_cocina;";
        $param = array();
        return parent::gselect($sql, $param);
    }
    public function findID($p_cliente_id)
    {
        $sql = 'SELECT id, nombre, tipo, marca, precio, cantidad, proveedor, codigo_barra
         FROM equipos_para_cocina
         WHERE id = :p_cliente_id; ';
        $params = array();
        array_push($params, [':p_cliente_id', $p_cliente_id, PDO::PARAM_INT]);
        return parent::gselect($sql, $params);
    }

    public function findPaginateAll($p_limit, $p_offset, $p_busqueda){
        $sql = "SELECT id, nombre, tipo, marca, precio, cantidad, proveedor, codigo_barra
        FROM equipos_para_cocina 
        WHERE UPPER(CONCAT(IFNULL(id,''),IFNULL(nombre,''),
                         IFNULL(tipo,''),IFNULL(marca,''),
                         IFNULL(precio,''),
                           IFNULL(cantidad,''))) 
        like CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%')
        LIMIT :p_limit
        OFFSET :p_offset;";
        $params = array();
        array_push($params, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($params, [':p_offset', $p_offset, PDO::PARAM_INT]);
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var = parent::gselect($sql, $params);
        $sqlCount = "SELECT COUNT(1) as cant
        FROM equipos_para_cocina 
        WHERE UPPER(CONCAT(IFNULL(id,''),IFNULL(nombre,''),
                         IFNULL(tipo,''),IFNULL(marca,''),
                         IFNULL(precio,''),
                           IFNULL(cantidad,'')))  
        like CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%')
        ";
        $params = array();
       
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $params);
        $var['LENGHT'] = $var1['DATA'][0]['cant'];
        return $var;
    }

    public function insert(
        $p_nombre,
        $p_apellido,
        $p_email,
        $p_telefono,
        $p_direccion
    ) {
        $sql = "INSERT INTO equipos_para_cocina( nombre, tipo, marca, precio, cantidad)
         VALUES (:p_nombre, :p_apellido, :p_email, :p_telefono,
          :p_direccion);";
        $params = array();
        array_push($params, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($params, [':p_apellido', $p_apellido, PDO::PARAM_STR]);
        array_push($params, [':p_email', $p_email, PDO::PARAM_STR]);
        array_push($params, [':p_telefono', $p_telefono, PDO::PARAM_STR]);
        array_push($params, [':p_direccion', $p_direccion, PDO::PARAM_STR]);
        return parent::ginsert($sql, $params);
    }

    public function update(
        $p_cliente_id,
        $p_nombre,
        $p_apellido,
        $p_email,
        $p_telefono,
        $p_direccion
    ) { 
        $sql = "UPDATE equipos_para_cocina 
        SET nombre=:p_nombre, 
        tipo=:p_apellido,
         marca=:p_email,
          precio=:p_telefono,
           cantidad=:p_direccion 
        WHERE id=:p_cliente_id; ";
        $params = array();
        array_push($params, [':p_cliente_id', $p_cliente_id, PDO::PARAM_INT]);
        array_push($params, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($params, [':p_apellido', $p_apellido, PDO::PARAM_STR]);
        array_push($params, [':p_email', $p_email, PDO::PARAM_STR]);
        array_push($params, [':p_telefono', $p_telefono, PDO::PARAM_STR]);
        array_push($params, [':p_direccion', $p_direccion, PDO::PARAM_STR]);
        return parent::gupdate($sql, $params);
    }

    public function delete($p_cliente_id)
    {
        $sql = "DELETE FROM equipos_para_cocina WHERE id = :p_cliente_id; ";
        $params = array();
        array_push($params, [':p_cliente_id', $p_cliente_id, PDO::PARAM_INT]);
        return parent::gdelete($sql, $params);
    }
}
