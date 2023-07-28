<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA ALUMNOS</title>
    <link rel="stylesheet" type="text/css" href="Styles/estilos_ver_alumnos_sensei.css" media="screen" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
</head>

<body>

    <header id="main-header">
        <a id="logo-header" href="">
            <span class="site-name"><img src="Img/Sin título_preview_rev_1.png"></span>
        </a>

        <nav>
            <ul>
                <li><a href="sensei.php">Volver</a></li>
                <li><a href="Iniciar_Sesion.php">Salir</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br>

    <!-- Contenido -->
    <div class="container mt-4">
        <h1>Tabla de Alumnos</h1>
        <a href="sensei_registro_alumnos.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Agregar</a>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Cinta</th>
                    <th>Calificación</th>
                    <th>Torneo</th>
                    <th>Clasificación</th>
                    <th>Sensei</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir el archivo para la conexión y consulta a la base de datos
                include "php/tabla_alumnos.php";

                // Mostrar los datos de la tabla ALUMNO en la tabla HTML
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['matricula'] . "</td>";
                    echo "<td>" . $fila['nombre_alum'] . "</td>";
                    echo "<td>" . $fila['apaterno_alum'] . "</td>";
                    echo "<td>" . $fila['amaterno_alum'] . "</td>";
                    echo "<td>" . $fila['cinta'] . "</td>";
                    echo "<td>" . $fila['calificacion'] . "</td>";
                    echo "<td>" . $fila['torneo'] . "</td>";
                    echo "<td>" . $fila['clasificacion'] . "</td>";
                    echo "<td>" . $fila['id_sensei'] . "</td>";
                    echo '<td>';
                    echo '<a href="editar_alumno.php?matricula=' . $fila['matricula'] . '" class="btn btn-primary btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a> ';
                    echo '<a href="eliminar_alumno.php?matricula=' . $fila['matricula'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                    echo '</td>';
                    echo "</tr>";


                    // Modal de confirmación para eliminar el alumno
                    echo '<div class="modal fade" id="eliminarModal' . $fila['matricula'] . '" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">';
                    echo '   <div class="modal-dialog" role="document">';
                    echo '       <div class="modal-content">';
                    echo '           <div class="modal-header">';
                    echo '               <h5 class="modal-title" id="eliminarModalLabel">Eliminar Alumno</h5>';
                    echo '               <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '                   <span aria-hidden="true">&times;</span>';
                    echo '               </button>';
                    echo '           </div>';
                    echo '           <div class="modal-body">';
                    echo '               <p>¿Estás seguro de que deseas eliminar este alumno?</p>';
                    echo '           </div>';
                    echo '           <div class="modal-footer">';
                    echo '               <form action="eliminar_alumno.php" method="post">';
                    echo '                   <input type="hidden" name="matricula" value="' . $fila['matricula'] . '">';
                    echo '                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
                    echo '                   <button type="submit" class="btn btn-danger">Eliminar</button>';
                    echo '               </form>';
                    echo '           </div>';
                    echo '       </div>';
                    echo '   </div>';
                    echo '</div>';

                    // Modal para editar datos del alumno
                    echo '<div class="modal fade" id="editarModal' . $fila['matricula'] . '" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">';
                    echo '   <div class="modal-dialog" role="document">';
                    echo '       <div class="modal-content">';
                    echo '           <div class="modal-header">';
                    echo '               <h5 class="modal-title" id="editarModalLabel">Editar Alumno</h5>';
                    echo '               <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '                   <span aria-hidden="true">&times;</span>';
                    echo '               </button>';
                    echo '           </div>';
                    echo '           <div class="modal-body">';
                    echo '               <form action="php/actualizar_alumno.php" method="post">';
                    echo '                   <input type="hidden" name="matricula" value="' . $fila['matricula'] . '">';
                    echo '                   <label for="nombre">Nombre</label>';
                    echo '                   <input type="text" name="nombre" id="nombre" value="' . $fila['nombre_alum'] . '" required>';
                    // Agrega aquí los demás campos del formulario para editar los datos del alumno
                    echo '                   <label for="apaterno">Apellido Paterno</label>';
                    echo '                   <input type="text" name="apaterno" id="apaterno" value="' . $fila['apaterno_alum'] . '" required>';

                    echo '                   <label for="amaterno">Apellido Materno</label>';
                    echo '                   <input type="text" name="amaterno" id="amaterno" value="' . $fila['amaterno_alum'] . '" required>';

                    echo '                   <label for="cinta">Cinta</label>';
                    echo '                   <input type="text" name="cinta" id="cinta" value="' . $fila['cinta'] . '" required>';

                    echo '                   <label for="calificacion">Calificación</label>';
                    echo '                   <input type="number" name="calificacion" id="calificacion" value="' . $fila['calificacion'] . '" required>';

                    echo '                   <label for="torneo">Torneo</label>';
                    echo '                   <input type="text" name="torneo" id="torneo" value="' . $fila['torneo'] . '" required>';

                    echo '                   <label for="clasificacion">Clasificación</label>';
                    echo '                   <input type="text" name="clasificacion" id="clasificacion" value="' . $fila['clasificacion'] . '" required>';

                    echo '                   <label for="id_sensei">ID del Sensei</label>';
                    echo '                   <input type="number" name="id_sensei" id="id_sensei" value="' . $fila['id_sensei'] . '" required>';


                    echo '                   <label>';
                    echo '               </form>';
                    echo '           </div>';
                    echo '       </div>';
                    echo '   </div>';
                    echo '</div>';
                }

                // Liberar el resultado y cerrar la conexión
                $resultado->free();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>

</html>