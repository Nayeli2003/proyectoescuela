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
        <div class="container mt-4">
        <h1>Inscribir Nuevo Alumno</h1>
        <form action="php/procesar_inscribir_alum_torneo.php" method="post">

            <label for="id_torneo">ID Torneo:</label>
            <input type="number" name="id_torneo" required>

            <label for="categoria">Categoría:</label>
            <select name="categoria" required>
                <option value="Categoria menor de edad">4-8 años cinta blanca - blanca y naranja</option>
                <option value="Categoria menor de edad">9-12 años cinta amarilla - naranja</option>
                <option value="Categoria menor de edad">13-18 años cinta verde - azul</option>
                <option value="Categoria mayor de edad">18-22 años cinta cafe peso 70Kg - 80Kg</option>
                <option value="Categoria mayor de edad">23-26 años cinta cafe - negro peso 80Kg - 90Kg</option>
                <option value="Categoria mayor de edad">27-30 años cinta negra peso 85Kg - 95Kg</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" required>

            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" name="fecha_fin" required>

            <label for="matricula">Matrícula:</label>
            <input type="number" name="matricula" required>

            <label for="id_admin">ID Admin:</label>
            <input type="number" name="id_admin" required>

            <button type="submit">Inscribir Alumno</button>

        </form>
        </div>
        <footer>
            Copyright &copy; 2023 Karate-Soul - Todos los derechos reservados
        </footer>

    </html>
</body>

</html>