<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARATE-SOUL</title>
    <link rel="stylesheet" type="text/css" href="Styles/estilos_index.css" media="screen" />
</head>

<body>


    <header id="main-header">
        <a id="logo-header" href="index.php">
            <span class="site-name"><img src="Img/Sin título_preview_rev_1.png"></span>

        </a>
        <nav>
            <ul>
                <li><a href="Iniciar_Sesion.php">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <h1>¿Qué es Karate-Soul?</h1>

    <img src="Img/K1.jpg">
    <p>
        El karate o kárate​ es un arte marcial tradicional basada en algunos estilos de las artes marciales chinas, y en
        otras disciplinas provenientes de Okinawa. El nombre japonés se compone de las palabras 空 y 手. A la persona que
        lo practica se la llama karateca.
        El término alma o ánima se refiere a una entidad inmaterial que, según las afirmaciones y creencias de
        diferentes tradiciones y perspectivas filosóficas y religiosas, poseen los seres vivos. La descripción de sus
        propiedades y características varía según cada una de esas tradiciones y perspectivas.​
    </p><BR></BR>

    <div class="slide">
        <div class="slide-inner">
            <input class="slide-open" type="radio" id="slide-1" name="slide" aria-hidden="true" hidden="" checked="checked">
            <div class="slide-item">
                <img src="Img/F1.jpeg">
            </div>
            <input class="slide-open" type="radio" id="slide-2" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <img src="Img/logo.jpeg">
            </div>
            <input class="slide-open" type="radio" id="slide-3" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <img src="Img/F3.jpeg">
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

    <h1>TORNEOS</h1>
    <p>
        KARATE-SOUL hace torneos de <b><i>"KATA"</i></b> que es la forma o secuencia de movimientos establecidos que se pueden
        practicar tanto en solitario como en parejas o como en grupo en una clase de artes marciales. KARATE-SOUL
        da 3 calificaciónes a cada participante para hacer un promedio y poder establecer 1er, 2do y 3er lugar,
        también se divide los torneos en dos formas,
        que son las siguientes:
    </p>
    <h2> Por Categoria</h2>
    <img src="Img/k2.jpg">
    <p>
        Los torneos por <i><b>"CATEGORIA"</b></i> se hacen dependiendo la edad, (el participante
        debe ser menor a 18 años), y el tipo de cinta que tenga el participante.
    </p>

    <h2>Por Puntos</h2>
    <img src="Img/k3.jfif">
    <p>
        Los torneos por <i><b>"PUNTOS"</b></i> se hacen dependiendo su peso y el tipo de cinta que tenga el participante,
        también debe ser mayor a 18 años.
    </p><br>


    <h3>Misión y Visión</h3>
    <h4>
        Misión <br><br>

        <img src="Img/mision.png" alt="">
        <br><br>
        Fomentar el deporte del Karate en la República Mexicana, para que se practique de forma masiva, <br>
        organizando y unificando a todos los deportistas, oficiales y directivos del país a través de las <br>
        Asociaciones Afiliadas; así como apoyar y promover su enseñanza a tráves de programas generales del <br>
        deporte, procurando la unidad metodológica en las actividades de todos sus afiliados, conducentes a la<br>
        obtención de competidores de alto rendimiento a nivel nacional e internacional, siguiendo para tal efecto<br>
        las normas que fijan su Estatuto, su Reglamento y las normas técnico - deportivas, conforme a la <br>
        Reglamentación de la Federación Mundial de Karate (World Karate Federation). <br><br>

        Visión <br><br>

        <img src="Img/vision.png" alt="">

        <br><br>
        Consolidarnos como un organismo deportivo de excelencia con compromiso social, forjador de <br>
        mexicanos con principios y valores a través de la práctica del Karate-Do, sus acciones en el ámbito<br>
        nacional se realizarán conforme al marco de ejecución y evaluación dentro del Programa Nacional de<br>
        Cultura Física y Deporte.

    </h4>
    <br>

    <h2>Contacto</h2>

    <form action="#" target="" method="get" name="formDatosPersonales">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre" />

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" placeholder="1r Apellido" />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email" required />

        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" for="mensaje" placeholder="describe brevemente en menos de 300 carácteres"
            maxlength="300"></textarea>

        <input type="submit" name="enviar" value="enviar datos" />
    </form>
    </form>



    <footer>
        Copyright &copy; 2023 Karate-Soul - Todos los derechos reservados
    </footer>

</body>

</html>