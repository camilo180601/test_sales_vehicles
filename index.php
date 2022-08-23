<?php
require_once 'layout/header.php';
?>
        <a class="btn btn-primary" href="tabla-ventas.php">Ver Ventas</a>
        <br>


        <form class="row g-3" action="index2.php" method="post">
            <div class="mb-3 row">
                <label for="marca">Seleccione la Marca: </label>
                <br>
                <select name="marca" id="marca">
                    <option value="0">Seleccione una Opción</option>
                    <option value="1">Ford</option>
                    <option value="2">Chevrolet</option>
                    <option value="3">Ferrari</option>
                </select>
            </div>
            <br>
            <br>
            <div class="mb-3 row" id="selectmodelo">

            </div>
            <br>
            <input class="btn btn-success" type="submit" value="Seleccionar">
        </form>
        
        

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
