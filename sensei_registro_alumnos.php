<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAR</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TORNEOS</title>
        <link rel="stylesheet" type="text/css" href="Styles/Estilos_registro.css" media="screen" />

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
                    <li><a href="ver_alumnos_sensei.php">Volver</a></li>
                    <li><a href="Iniciar_Sesion.php">Salir</a></li>
                </ul>
            </nav>
        </header>
        <br><br><br>

        <div class="container mt-4">
            <h1>Registrar Nuevo Alumno</h1>
            <form action="php/procesar_registro_alumno.php" method="post">
                <label for="matricula">Matrícula</label>
                <input type="number" name="matricula" id="matricula" required>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="apaterno">Apellido Paterno</label>
                <input type="text" name="apaterno" id="apaterno" required>

                <label for="amaterno">Apellido Materno</label>
                <input type="text" name="amaterno" id="amaterno" required>

                <label for="cinta">Cinta</label>
                <input type="text" name="cinta" id="cinta" required>

                <label for="calificacion">Calificación</label>
                <input type="number" name="calificacion" id="calificacion" required>

                <label for="torneo">Torneo</label>
                <input type="text" name="torneo" id="torneo" required>


                <label for="clasificacion">Clasificación</label>
                <input type="text" name="clasificacion" id="clasificacion" required>

                <label for="id_sensei">ID del Sensei</label>
                <input type="number" name="id_sensei" id="id_sensei" required>

                <input type="submit" name="submit" value="Agregar">
            </form>
        </div>

        <footer>
            Copyright &copy; 2023 Karate-Soul - Todos los derechos reservados
        </footer>

    </html>
</body>

</html>