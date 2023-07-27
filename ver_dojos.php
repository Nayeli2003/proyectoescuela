<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOJOS</title>
    <link rel="stylesheet" type="text/css" href="Styles/estilos_dojos.css" media="screen" />
    <!--===================================================================
    plugins de CSS
    =======================================================================-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!--===================================================================
    plugins de JS
    =======================================================================-->
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

</head>

<body>

    <header id="main-header">
        <a id="logo-header" href="">
            <span class="site-name"><img src="Img/Sin título_preview_rev_1.png"></span> </a>


        <nav>
            <ul>
                <li><a href="admin.php">Volver</a></li>
                <li><a href="Iniciar_Sesion.php">Salir</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br>


    <!--================================================================
    Contenido
    =====================================================================-->
    <div class="container mt-4">
        <h1>Tabla de Dojos</h1>
        <a href="admin_registrar_doyo.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Registrar</a>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID Dojo</th>
                    <th>Nombre</th>
                    <th>Calle</th>
                    <th>CP</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Numero Telefonico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "php/conexion.php";

                // Consulta los datos de la tabla DOJO
                $sql = "SELECT * FROM DOJO";
                $resultado = $conn->query($sql);

                // Verifica si hay resultados y muestra los datos en la tabla
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id_dojo'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['calle'] . "</td>";
                        echo "<td>" . $fila['C_P'] . "</td>";
                        echo "<td>" . $fila['estado'] . "</td>";
                        echo "<td>" . $fila['municipio'] . "</td>";
                        echo "<td>" . $fila['numero_tel'] . "</td>";
                        echo "<td>";
                        echo "<a href='modificar_dojo.php?id_dojo=" . $fila['id_dojo'] . "' class='btn btn-primary mr-2'>Modificar</a>";
                        echo "<a href='eliminar_dojo.php?id_dojo=" . $fila['id_dojo'] . "' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";

                        // Modal para eliminar el DOJO
                        echo '<div class="modal fade" id="eliminarModal' . $fila['id_dojo'] . '" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel' . $fila['id_dojo'] . '" aria-hidden="true">';
                        echo '   <div class="modal-dialog" role="document">';
                        echo '       <div class="modal-content">';
                        echo '           <div class="modal-header">';
                        echo '               <h5 class="modal-title" id="eliminarModalLabel' . $fila['id_dojo'] . '">Eliminar DOJO</h5>';
                        echo '               <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                        echo '                   <span aria-hidden="true">&times;</span>';
                        echo '               </button>';
                        echo '           </div>';
                        echo '           <div class="modal-body">';
                        echo '               <p>¿Estás seguro de que deseas eliminar este DOJO?</p>';
                        echo '           </div>';
                        echo '           <div class="modal-footer">';
                        echo '               <form action="eliminar_dojo.php" method="post">';
                        echo '                   <input type="hidden" name="id_dojo" value="' . $fila['id_dojo'] . '">';
                        echo '                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
                        echo '                   <button type="submit" class="btn btn-danger">Eliminar</button>';
                        echo '               </form>';
                        echo '           </div>';
                        echo '       </div>';
                        echo '   </div>';
                        echo '</div>';

                        // Modal para editar el DOJO
                        echo "<div class='modal fade' id='editarModal-" . $fila['id_dojo'] . "' tabindex='-1' role='dialog' aria-labelledby='editarModalLabel-" . $fila['id_dojo'] . "' aria-hidden='true'>";
                        echo "<div class='modal-dialog' role='document'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title' id='editarModalLabel-" . $fila['id_dojo'] . "'>Editar DOJO</h5>";
                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<form action='actualizar_dojo.php' method='post'>";
                        echo "<input type='hidden' name='id_dojo' value='" . $fila['id_dojo'] . "'> ";
                        echo "<label for='nombre'>Nombre</label>";
                        echo "<input type='text' name='nombre' id='nombre' value='" . $fila['nombre'] . "' required>";
                        echo "<label for='calle'>Calle</label>";
                        echo "<input type='text' name='calle' id='calle' value='" . $fila['calle'] . "' required>";
                        echo "<label for='C_P'>C.P</label>";
                        echo "<input type='text' name='C_P' id='C_P' value='" . $fila['C_P'] . "' required>";
                        echo "<label for='estado'>Estado</label>";
                        echo "<input type='text' name='estado' id='estado' value='" . $fila['estado'] . "' required>";
                        echo "<label for='municipio'>Municipio</label>";
                        echo "<input type='text' name='municipio' id='municipio' value='" . $fila['municipio'] . "' required>";
                        echo "<label for='numero_tel'>Número Telefónico</label>";
                        echo "<input type='text' name='numero_tel' id='numero_tel' value='" . $fila['numero_tel'] . "' required>";
                        echo "<button type='submit' class='btn btn-primary mt-2'>Guardar cambios</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron datos en la tabla DOJO.</td></tr>";
                }
                ?>
            </tbody>
    </div>
</body>

</html>