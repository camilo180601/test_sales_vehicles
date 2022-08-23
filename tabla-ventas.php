<?php
require_once 'layout/header.php';
?>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha Venta</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cantidad Venta</th>
                    <th>Precio Unidad</th>
                    <th>Total Venta</th>
                    <th><a class="btn btn-primary" href="index.php">Inicio</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM marca INNER JOIN modelo ON marca.id_marca = modelo.fk_marca INNER JOIN ventas ON ventas.fk_modelo = modelo.id_modelo;";
                    $query = mysqli_query($conexion, $sql);
                    foreach($query as $row):
                ?>
                <tr>
                    <td><?=$row['Fecha']?></td>
                    <td><?=$row['nombre_marca']?></td>
                    <td><?=$row['nombre_modelo']?></td>
                    <td><?=$row['cantidad_venta']?></td>
                    <td><?=$row['precio_unidad']?></td>
                    <td><?=$row['total_venta']?></td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
        
    </div>
</body>

</html>