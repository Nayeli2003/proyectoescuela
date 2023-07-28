<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TORNEOS</title>
    <link rel="stylesheet" type="text/css" href="Styles/estilos_ver_torneos.css" media="screen" />

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
            <span class="site-name"><img src="Img/Sin título_preview_rev_1.png"></span></a>

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
        <h1>Tabla de Torneo Administrador</h1>
        <a href="admin_resgistrar_torneo.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Registrar</a>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID Torneo Administrador</th>
                    <th>Categoría</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>ID Administrador</th>
                    <th>ID Dojo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "php/conexion.php"; // Incluir el archivo de conexión

                // Consulta los datos de la tabla TORNEO_ADM
                $sql = "SELECT * FROM TORNEO_ADM";
                $resultado = $conn->query($sql);

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_torneo_adm'] . '</td>';
                    echo '<td>' . $fila['categoria'] . '</td>';
                    echo '<td>' . $fila['fecha_inicio'] . '</td>';
                    echo '<td>' . $fila['fecha_fin'] . '</td>';
                    echo '<td>' . $fila['id_admin'] . '</td>';
                    echo '<td>' . $fila['id_dojo'] . '</td>';
                    echo '<td class="d-flex">';
                    // Botón "Editar" con ícono de lápiz
                    echo '<a href="editar_torneo_adm.php?id_torneo_adm=' . $fila['id_torneo_adm'] . '" class="btn btn-primary btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>';
                    // Botón "Eliminar" con ícono de papelera
                    echo '<a href="eliminar_torneo_adm.php?id_torneo_adm=' . $fila['id_torneo_adm'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';
                    echo '</td>';
                    echo '</tr>';

                    // Modal para eliminar el torneo
                    echo '<div class="modal fade" id="eliminarModal' . $fila['id_torneo_adm'] . '" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel' . $fila['id_torneo_adm'] . '" aria-hidden="true">';
                    echo '<div class="modal-dialog" role="document">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="eliminarModalLabel' . $fila['id_torneo_adm'] . '">Eliminar Torneo</h5>';
                    echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    echo '<p>¿Estás seguro de que deseas eliminar este torneo?</p>';
                    echo '</div>';
                    echo '<div class="modal-footer">';
                    echo '<form action="eliminar_torneo_adm.php" method="post">';
                    echo '<input type="hidden" name="id_torneo" value="' . $fila['id_torneo_adm'] . '">';
                    echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
                    echo '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>