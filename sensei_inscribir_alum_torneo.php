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
                <li><a href="ver_torneos_sensei.php">Volver</a></li>
                <li><a href="Iniciar_Sesion.php">Salir</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br>

    <form action="php/procesar_registro_alumno.php" method="post">

    <label for="id_torneo">ID Torneo:</label>
    <input type="number" name="id_torneo" required>

    <label for="categoria">Categoría:</label>
    <input type="text" name="categoria" required>

    <label for="id_torneo">Fecha de Inicio:</label>
    <input type="number" name="id_torneo" required>

    <label for="id_torneo">Fecha de Fin:</label>
    <input type="number" name="id_torneo" required>

    <label for="id_torneo">Matrícula:</label>
    <input type="number" name="id_torneo" required>

    <label for="id_torneo">ID Admin:</label>
    <input type="number" name="id_torneo" required>

    <button type="submit">Inscribir Alumno</button>
        
    </form>

    <footer>
        Copyright &copy; 2023 Karate-Soul - Todos los derechos reservados
    </footer>
</html>
</body>
</html>


ID Torneo	Categoría	Fecha de Inicio	Fecha de Fin	Matrícula	ID Admin