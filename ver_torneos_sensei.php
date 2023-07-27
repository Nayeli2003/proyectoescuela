<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TORNEOS</title>
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
            <span class="site-name"><img src="Img/Sin título_preview_rev_1.png"></span>

        </a>
        <nav>
            <ul>
                <li><a href="sensei_inscribir_alum_torneo.php">Inscribir</a></li>
                <li><a href="sensei.php">Volver</a></li>
                <li><a href="Iniciar_Sesion.php">Salir</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br>


    <!--================================================================
    Contenido
    =====================================================================-->
    <div class="container mt-4">
        <h1>Tabla de Torneos</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID Torneo</th>
                    <th>Categoría</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Matrícula</th>
                    <th>ID Admin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir el archivo de conexión a la base de datos
                include "php/conexion.php";

                // Consultar los datos de la tabla TORNEO
                $sql = "SELECT * FROM TORNEO";
                $result = $conn->query($sql);

                // Mostrar los datos en la tabla HTML
                if ($result->num_rows > 0) {
                    while ($fila = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id_torneo'] . "</td>";
                        echo "<td>" . $fila['categoria'] . "</td>";
                        echo "<td>" . $fila['fecha_inicio'] . "</td>";
                        echo "<td>" . $fila['fecha_fin'] . "</td>";
                        echo "<td>" . $fila['matricula'] . "</td>";
                        echo "<td>" . $fila['id_admin'] . "</td>";
                        echo '<td>';
                        echo '<a href="editar_torneo.php?id_torneo=' . $fila['id_torneo'] . '" class="btn btn-primary btn-sm">Editar</a> ';
                        echo '<a href="eliminar_torneo.php?id_torneo=' . $fila['id_torneo'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>';
                        echo '</td>';
                        echo "</tr>";

                        // Modal de confirmación para eliminar el alumno
                        echo '<div class="modal fade" id="eliminarModal' . $fila['id_torneo'] . '" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">';
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
                        echo '               <form action="eliminar_torneo.php" method="post">';
                        echo '                   <input type="hidden" name="matricula" value="' . $fila['id_torneo'] . '">';
                        echo '                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
                        echo '                   <button type="submit" class="btn btn-danger">Eliminar</button>';
                        echo '               </form>';
                        echo '           </div>';
                        echo '       </div>';
                        echo '   </div>';
                        echo '</div>';
                        // Modal para editar datos del torneo
                        echo '<div class="modal fade" id="editarModal' . $fila['id_torneo'] . '" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">';
                        echo '   <div class="modal-dialog" role="document">';
                        echo '       <div class="modal-content">';
                        echo '           <div class="modal-header">';
                        echo '               <h5 class="modal-title" id="editarModalLabel">Editar Torneo</h5>';
                        echo '               <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                        echo '                   <span aria-hidden="true">&times;</span>';
                        echo '               </button>';
                        echo '           </div>';
                        echo '           <div class="modal-body">';
                        echo '               <form action="actualizar_torneo.php" method="post">';
                        echo '                   <input type="hidden" name="id_torneo" value="' . $fila['id_torneo'] . '">';
                        // Agrega el campo de categoría como un select con las opciones disponibles
                        echo '                   <label for="categoria">Categoría:</label>';
                        echo '                   <select name="categoria" required>';
                        echo '                       <option value="Categoria menor de edad">4-8 años cinta blanca - blanca y naranja</option>';
                        echo '                       <option value="Categoria menor de edad">9-12 años cinta amarilla - naranja</option>';
                        echo '                       <option value="Categoria menor de edad">13-18 años cinta verde - azul</option>';
                        echo '                       <option value="Categoria meyor de edad">18-22 años cinta cafe peso 70Kg - 80Kg</option>';
                        echo '                       <option value="Categoria meyor de edad">23-26 años cinta cafe - negro peso 80Kg - 90Kg</option>';
                        echo '                       <option value="Categoria meyor de edad">27-30 años cinta negra peso 85Kg - 95Kg</option>';
                        // Agrega más opciones según tus necesidades
                        echo '                   </select>';

                        // Agrega aquí los demás campos del formulario para editar los datos del torneo
                        echo '                   <label for="fecha_inicio">Fecha de Inicio</label>';
                        echo '                   <input type="date" name="fecha_inicio" id="fecha_inicio" value="' . $fila['fecha_inicio'] . '" required>';

                        // ... (Continuar con el código de los demás campos del formulario)

                        echo '                   <button type="submit" class="btn btn-primary">Guardar Cambios</button>';
                        echo '               </form>';
                        echo '           </div>';
                        echo '       </div>';
                        echo '   </div>';
                        echo '</div>';
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron datos en la tabla TORNEO.</td></tr>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>