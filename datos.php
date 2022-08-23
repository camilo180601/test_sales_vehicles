<?php
$conexion=mysqli_connect('localhost', 'root', '', 'ventas_de_vehiculos');

$marca = $_POST['Marca'];


    $sql="SELECT id_modelo, nombre_modelo, Stock_modelo, precio_unidad, fk_marca FROM modelo WHERE fk_marca='$marca' AND Stock_modelo>0";
    $result=mysqli_query($conexion, $sql);


    $cadena="<label>Seleccione el Modelo: </label>
            <br>
            <select id='modelo' name='modelo'>";

    while($ver=mysqli_fetch_row($result)){
        $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
    }

    echo $cadena."</select>";




?>