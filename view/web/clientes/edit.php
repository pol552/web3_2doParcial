<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;
//echo $pAccion;
$client = new HttpClient(HTTP_BASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $datajson = [
        'id' => $_POST['id'],
        'nombre' => $_POST['nombre'],
        'tipo' => $_POST['tipo'],
        'marca' => $_POST['marca'],
        'precio' => $_POST['precio'],
        'cantidad' => $_POST['cantidad']
    ];
    if ($pAccion == 'EDIT') {
        $result = $client->put('/controller/Ven_clientesController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $client->post('/controller/Ven_clientesController.php', $datajson);
    } else  if ($pAccion == 'DELETE') {
        $result = $client->delete('/controller/Ven_clientesController.php', $datajson);
    }
    var_dump($result);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '".HTTP_BASE."/web/cli/list';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el adminsitrador.');</script>";
    }
}
if($pAccion == 'NEW')
{
    $record =  [
        'id' => '',
        'nombre' => '',
        'tipo' => '',
        'marca' => '',
        'precio' => '',
        'cantidad' => '',
        'proveedor'=> '',
        'codigo_barra'=> '',
    ];
}else{
    $responseData = $client->get('/controller/Ven_clientesController.php', [
        'ope' => 'filterId',
        'id' => $pId,
    ]);
    $record = $responseData['DATA'][0];
}
//var_dump($record);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5> Equipos para cocina</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Equipos</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fortxt01">Codigo Equipo</label>
                                <input id="fortxt01" type="text" class="form-control" placeholder="Codigo Cliente " name="id" value="<?php echo $record['id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fortxt02">Nombre</label>
                                <input id="fortxt02" type="text" class="form-control" placeholder="Nombre " name="nombre" value="<?php echo $record['nombre']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Tipo</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="Tipo " name="tipo" value="<?php echo $record['tipo']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt04">Marca</label>
                                <input id="fortxt04" type="text" class="form-control" placeholder="Marca " name="marca" e value="<?php echo $record['marca']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt05">Precio</label>
                                <input id="fortxt05" type="text" class="form-control" placeholder="Precio" name="precio" value="<?php echo $record['precio']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Cantidad</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="Cantidad " name="cantidad" value="<?php echo $record['cantidad']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Proveedor</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="Proveedor " name="proveedor" value="<?php echo $record['proveedor']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Codigo de Barra</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="Codigo de Barra " name="codigo_barra" value="<?php echo $record['codigo_barra']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>



                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') :?>
                            <button type="submit" class="btn btn-danger"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif;?>
                            <a href="<?php echo HTTP_BASE; ?>/web/cli/list" class="btn btn-primary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php require ROOT_VIEW . '/template/footer.php'; ?>