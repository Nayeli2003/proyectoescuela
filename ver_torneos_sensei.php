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
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_torneo'] . "</td>";
                    echo "<td>" . $row['categoria'] . "</td>";
                    echo "<td>" . $row['fecha_inicio'] . "</td>";
                    echo "<td>" . $row['fecha_fin'] . "</td>";
                    echo "<td>" . $row['matricula'] . "</td>";
                    echo "<td>" . $row['id_admin'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron datos en la tabla TORNEO.</td></tr>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>
    </div>
</body>

</html>