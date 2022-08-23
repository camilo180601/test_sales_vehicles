<?php
require_once 'layout/header.php';
?>
        <a class="btn btn-primary" href="tabla-ventas.php">Ver Ventas</a>


        <?php
        if ($_POST) {
            $marca = $_POST['marca'];
            $consulta1 = "SELECT * FROM marca WHERE id_marca = $marca";
            $query1 = mysqli_query($conexion, $consulta1);
            $cmarca = mysqli_fetch_array($query1);

            $modelo = $_POST['modelo'];
            $consulta = "SELECT * FROM modelo WHERE id_modelo = $modelo";
            $query = mysqli_query($conexion, $consulta);
            $cmodelo = mysqli_fetch_array($query);
        ?>  
            <br>
            <strong class="alert alert-success">Vehiculo Seleccionado: <?= $cmarca['nombre_marca'] . ' ' . $cmodelo['nombre_modelo'] ?></strong>
            <br>
            <br>
            <br>
            <form class="row g-3" action="guardar.php" method="post">
                
                <br>
                <input id="marca" name="marca" type="hidden" value="<?=$_POST['marca'];?>">
                <input id="modelo" name="modelo" type="hidden" value="<?=$_POST['modelo'];?>">
                <br>
                <br>
                <br>
                <div class="mb-3 row">
                    <label for="cantidad">Ingrese la cantidad: </label>
                    <br>
                    <input class="cantidad" name="cantidad" id="cantidad" type="number" min="1" max="<?= $cmodelo['Stock_modelo'] ?>" step="1">
                    <br>
                    
                </div>
                <input class="btn btn-success" type="submit" value="Registrar Venta">
            </form>
            
        <?php
        }
        ?>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        recargarLista();

        $('#marca').change(function() {
            recargarLista();
        });

    })
</script>

<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "datos.php",
            data: "Marca=" + $('#marca').val(),
            success: function(r) {
                $('#selectmodelo').html(r);
            }
        });

    }
</script>

<script>
    $(function() {

        $('.cantidad').on('keyup', function() {
            let max = $(this).attr('max')
            let cant = $(this).val()
            console.log(cant)
            if (cant > parseInt(max, 10)) {
                $(this).val(max)
            }
            if (cant < 0) {
                $(this).val(1)
            }

        })
        $('.cantidad').on('blur', function() {
            let cant = $(this).val()
            if (cant == '') {
                $(this).val(1)
            }
        })
        $(document).ready(cant);

    })
</script>