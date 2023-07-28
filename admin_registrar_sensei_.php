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
                <li><a href="ver_sensei.php">Volver</a></li>
                <li><a href="Iniciar_Sesion.php">Salir</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br>

    <div class="container mt-4">
        <h1>Registrar Nuevo Sensei</h1>
        <form action="php/procesar_registro_sensei.php" method="post">
            <label for="id_sensei">ID Sensei</label>
            <input type="number" name="id_sensei" id="id_sensei" required />

            <label for="nombre_sensei">Nombre</label>
            <input type="text" name="nombre_sensei" id="nombre_sensei" required />

            <label for="apaterno_sensei">Apellido Paterno</label>
            <input type="text" name="apaterno_sensei" id="apaterno_sensei" required />

            <label for="amaterno_sensei">Apellido Materno</label>
            <input type="text" name="amaterno_sensei" id="amaterno_sensei" required />

            <label for="numero_tel">Número Telefónico</label>
            <input type="number" name="numero_tel" id="numero_tel" required />

            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" required />

            <label for="id_dojo">ID Dojo</label>
            <input type="number" name="id_dojo" id="id_dojo" required />

            <label for="id_admin">ID Administrador</label>
            <input type="number" name="id_admin" id="id_admin" required />

            <input type="submit" name="enviar" value="ENTRAR" />
        </form>
    </div>
    <footer>
        Copyright &copy; 2023 Karate-Soul - Todos los derechos reservados
    </footer>

</body>

</html>
