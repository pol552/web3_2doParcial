<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");


session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/cocina/config/global.php");

require_once(ROOT_DIR . "/model/Ven_clientesModel.php");



$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}
switch ($method) {
    case 'GET': //consulta

        $p_ope = !empty($input['ope']) ? $input['ope'] : $_GET['ope'];
        if (!empty($p_ope)) {

            if ($p_ope == 'filterId') {
                filterId($input);
            } elseif ($p_ope == 'filterSearch') {
                filterPaginateAll($input);
            } elseif ($p_ope ==  'filterall') {
                filterAll($input);
            }
        }

        break;
    case 'POST': //inserta
        insert($input);
        break;
    case 'PUT': //actualiza
        update($input);
        break;
    case 'DELETE': //elimina
        delete($input);
        break;
    default: //metodo NO soportado
        echo 'METODO NO SOPORTADO';
        break;
}
function filterAll($input){
    $tobj = new Ven_clientesModel();
    $var = $tobj->findAll();
    echo json_encode($var);
}
function filterId($input){
    $p_cliente_id = !empty($input['id'])?$input['id']:
    $_GET['id'];
    $tobj = new Ven_clientesModel();
    $var = $tobj->findID($p_cliente_id);
    echo json_encode($var);
}
function  filterPaginateAll($input)
{
    $page = !empty($input['page'])?$input['page']:
    $_GET['page'];
    $p_busqueda = !empty($input['busqueda'])?$input['busqueda']:
    $_GET['busqueda'];
    $nro_record_page = 16; // y esto
    $p_limit = 16; //esto esta limitando la cantidad de visualizaciones
    $p_offset = 0;
    $p_offset = abs(($page - 1) * $nro_record_page);
    $tobj = new Ven_clientesModel();
    $var = $tobj->findPaginateAll($p_limit, $p_offset, $p_busqueda);
    echo json_encode($var);

}
function insert($input){
    $p_nombre = !empty($input['nombre'])?$input['nombre']:$_POST['nombre'];
    $p_apellido = !empty($input['tipo'])?$input['tipo']:$_POST['tipo'];
    $p_email = !empty($input['marca'])?$input['marca']:$_POST['marca'];
    $p_telefono = !empty($input['precio'])?$input['precio']:$_POST['precio'];
    $p_direccion = !empty($input['cantidad'])?$input['cantidad']:$_POST['cantidad'];
    $tobj = new Ven_clientesModel();
    $var = $tobj->insert(
        $p_nombre,
        $p_apellido,
        $p_email,
        $p_telefono,
        $p_direccion
    );
    echo json_encode($var);
}
function update($input){
    $p_cliente_id = !empty($input['id'])?$input['id']:$_POST['id'];
    $p_nombre = !empty($input['nombre'])?$input['nombre']:$_POST['nombre'];
    $p_apellido = !empty($input['tipo'])?$input['tipo']:$_POST['tipo'];
    $p_email = !empty($input['marca'])?$input['marca']:$_POST['marca'];
    $p_telefono = !empty($input['precio'])?$input['precio']:$_POST['precio'];
    $p_direccion = !empty($input['cantidad'])?$input['cantidad']:$_POST['cantidad'];
    $tobj = new Ven_clientesModel();
    $var = $tobj->update(
        $p_cliente_id,
        $p_nombre,
        $p_apellido,
        $p_email,
        $p_telefono,
        $p_direccion
    );
    echo json_encode($var);
}
function delete($input){
    $p_cliente_id = !empty($input['id'])?$input['id']:$_POST['id'];
    $tobj = new Ven_clientesModel();
    $var = $tobj->delete($p_cliente_id);
    echo json_encode($var);
}