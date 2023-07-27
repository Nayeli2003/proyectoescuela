<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENSEI</title>
    <link rel="stylesheet" type="text/css" href="Styles/estilos_sensei.css" media="screen" />
</head>

<body>

    <header id="main-header">
        <a id="logo-header" href="">
            <span class="site-name"><img src="Img/Sin título_preview_rev_1.png"></span>        </a>
        <nav>
            <ul>
                <li><a href="ver_alumnos_sensei.php">Alumnos</a></li>
                <li><a href="ver_torneos_sensei.php">Torneos</a></li>
                <li><a href="Iniciar_Sesion.php">Salir</a></li>
            </ul>
        </nav>
    </header>

    <div class="slide">
        <div class="slide-inner">
            <input class="slide-open" type="radio" id="slide-1" name="slide" aria-hidden="true" hidden=""
                checked="checked">
            <div class="slide-item">
                <img src="Img/logo.jpeg">
            </div>
            <input class="slide-open" type="radio" id="slide-2" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <img src="Img/L4.jpg">
            </div>
            <input class="slide-open" type="radio" id="slide-3" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <img src="Img/L3.jpg">
            </div>
            <label for="slide-3" class="slide-control prev control-1">‹</label>
            <label for="slide-2" class="slide-control next control-1">›</label>
            <label for="slide-1" class="slide-control prev control-2">‹</label>
            <label for="slide-3" class="slide-control next control-2">›</label>
            <label for="slide-2" class="slide-control prev control-3">‹</label>
            <label for="slide-1" class="slide-control next control-3">›</label>
            <ol class="slide-indicador">
                <li>
                    <label for="slide-1" class="slide-circulo">•</label>
                </li>
                <li>
                    <label for="slide-2" class="slide-circulo">•</label>
                </li>
                <li>
                    <label for="slide-3" class="slide-circulo">•</label>
                </li>
            </ol>
        </div>
    </div>

    <h4>
        <i> <b>"El exito es la paz mental, es la autosatisfacción de saber que haes lo maximo <br>
                para llegar a ser lo mejor que eres capaz de ser"</b></i>
    </h4>

    <footer>
        Copyright &copy; 2023 Karate-Soul - Todos los derechos reservados
    </footer>

</body>

</html>