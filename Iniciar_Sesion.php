<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESIÓN</title>
    <link rel="stylesheet" type="text/css" href="Styles/estilos_iniciar_sesion.css" media="screen" />
</head>

<body>

    <header id="main-header">
        <a id="logo-header" href="index.php">
            <span class="site-name"><img src="Img/Sin título_preview_rev_1.png"></span>
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Regresar</a></li>
            </ul>
        </nav>
    </header>

    <form action="php/registros.php" method="post" name="formDatosPersonales">

        <label for="matricula">Matricula</label>
        <input type="text" name="matricula" id="matricula" placeholder="Matricula" required />

        <label for="password">Contraseña</label>
        <input type="password" name="contraseña" id="password" placeholder="Escribe tu Contraseña" required />

        <input type="submit" name="enviar" value="ENTRAR" />
    </form>
    <footer>
        Copyright &copy; 2023 Karate-Soul - Todos los derechos reservados
    </footer>

</body>

</html>