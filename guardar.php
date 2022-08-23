<?php
require_once 'index2.php';
$conexion = mysqli_connect('localhost', 'root', '', 'ventas_de_vehiculos');
if (isset($_POST['cantidad'])) {
    $modelo=$_POST['modelo'];
    $consulta = "SELECT * FROM modelo WHERE id_modelo = $modelo";
    $query = mysqli_query($conexion, $consulta);
    $cmodelo = mysqli_fetch_array($query);
    $cantidad = $_POST['cantidad'];
    $id_modelo=$cmodelo['id_modelo'];
    $total = $cantidad * $cmodelo['precio_unidad'];

    
    $sql = "INSERT INTO ventas VALUES(null, $cantidad, $total, $modelo, CURDATE());";
    $sql2 = "UPDATE modelo SET Stock_modelo=Stock_modelo-$cantidad WHERE id_modelo=$id_modelo;";

    $guardar = mysqli_query($conexion, $sql);
    $actualizar = mysqli_query($conexion, $sql2);

    if($guardar){
        echo '<br><br><br><strong class="alert alert-success">Venta Registrada correctamente</strong>'; 
    }else{
        echo '<div class="container"><br><br><br><strong class="alert alert-danger">Error al registrar la venta</strong></div>';
    }

}

?>