<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENSEI</title>
    <link rel="stylesheet" type="text/css" href="Styles/estilos_ver_sensei.css" media="screen" />


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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
        <h1>Tabla Senseis</h1>
        <a href="admin_registrar_sensei_.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Registrar</a>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID Sensei</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Numero Telefonico</th>
                    <th>Contraseña</th>
                    <th>ID Dojo</th>
                    <th>ID Administrador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Itera sobre los resultados y muestra cada fila en la tabla
                require "php/conexion.php";

                // Consulta los datos de la tabla SENSEI
                $sql = "SELECT * FROM SENSEI";
                $resultado = $conn->query($sql);
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_sensei'] . '</td>';
                    echo '<td>' . $fila['nombre_sensei'] . '</td>';
                    echo '<td>' . $fila['apaterno_sensei'] . '</td>';
                    echo '<td>' . $fila['amaterno_sensei'] . '</td>';
                    echo '<td>' . $fila['numero_tel'] . '</td>';
                    echo '<td>' . $fila['contraseña'] . '</td>';
                    echo '<td>' . $fila['id_dojo'] . '</td>';
                    echo '<td>' . $fila['id_admin'] . '</td>';
                    // Columna de acciones con botones de íconos
                    echo '<td>';

                    // Botón con ícono de lápiz (para editar)
                    echo '<a href="modificar_sensei.php?id_sensei=' . $fila['id_sensei'] . '" class="btn btn-primary btn-smaller mr-2">';
                    echo '<i class="fas fa-pencil-alt"></i></a>';

                    // Botón con ícono de basura (para eliminar)
                    echo '<a href="eliminar_sensei.php?id_sensei=' . $fila['id_sensei'] . '" class="btn btn-danger btn-smaller">';
                    echo '<i class="fas fa-trash-alt"></i></a>';

                    echo '</td>';

                    echo '</tr>';

                    echo '<div class="modal fade" id="eliminarModal' . $fila['id_sensei'] . '" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel' . $fila['id_sensei'] . '" aria-hidden="true">';
                    echo '   <div class="modal-dialog" role="document">';
                    echo '       <div class="modal-content">';
                    echo '           <div class="modal-header">';
                    echo '               <h5 class="modal-title" id="eliminarModalLabel' . $fila['id_sensei'] . '">Eliminar SENSEI</h5>';
                    echo '               <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '                   <span aria-hidden="true">&times;</span>';
                    echo '               </button>';
                    echo '           </div>';
                    echo '           <div class="modal-body">';
                    echo '               <p>¿Estás seguro de que deseas eliminar este SENSEI?</p>';
                    echo '           </div>';
                    echo '           <div class="modal-footer">';
                    echo '               <form action="eliminar_sensei.php" method="post">';
                    echo '                   <input type="hidden" name="id_sensei" value="' . $fila['id_sensei'] . '">';
                    echo '                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
                    echo '                   <button type="submit" class="btn btn-danger">Eliminar</button>';
                    echo '               </form>';
                    echo '           </div>';
                    echo '       </div>';
                    echo '   </div>';
                    echo '</div>';

                    // Modal para editar el SENSEI
                    echo "<div class='modal fade' id='editarModal-" . $fila['id_sensei'] . "' tabindex='-1' role='dialog' aria-labelledby='editarModalLabel-" . $fila['id_sensei'] . "' aria-hidden='true'>";
                    echo "<div class='modal-dialog' role='document'>";
                    echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                    echo "<h5 class='modal-title' id='editarModalLabel-" . $fila['id_sensei'] . "'>Editar SENSEI</h5>";
                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                    echo "<span aria-hidden='true'>&times;</span>";
                    echo "</button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                    echo "<form action='actualizar_sensei.php' method='post'>";
                    echo "<input type='hidden' name='id_sensei' value='" . $fila['id_sensei'] . "'> ";
                    echo "<label for='nombre'>Nombre</label>";
                    echo "<input type='text' name='nombre' id='nombre' value='" . $fila['nombre_sensei'] . "' required>";
                    echo "<label for='apaterno'>Apellido Paterno</label>";
                    echo "<input type='text' name='apaterno' id='apaterno' value='" . $fila['apaterno_sensei'] . "' required>";
                    echo "<label for='amaterno'>Apellido Materno</label>";
                    echo "<input type='text' name='amaterno' id='amaterno' value='" . $fila['amaterno_sensei'] . "' required>";
                    echo "<label for='numero_tel'>Número Telefónico</label>";
                    echo "<input type='number' name='numero_tel' id='numero_tel' value='" . $fila['numero_tel'] . "' required>";
                    echo "<label for='contraseña'>Contraseña</label>";
                    echo "<input type='password' name='contraseña' id='contraseña' value='" . $fila['contraseña'] . "' required>";
                    echo "<label for='id_dojo'>ID Dojo</label>";
                    echo "<input type='number' name='id_dojo' id='id_dojo' value='" . $fila['id_dojo'] . "' required>";
                    echo "<label for='id_admin'>ID Administrador</label>";
                    echo "<input type='number' name='id_admin' id='id_admin' value='" . $fila['id_admin'] . "' required>";
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
                ?>
            </tbody>
    </div>
</body>

</html>