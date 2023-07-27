<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
</head>
<body>
    <?php
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Verifica si la matrícula del alumno se recibió en la URL
    if (isset($_GET["matricula"])) {
        $matricula = $_GET["matricula"];

        // Consulta los datos del alumno con la matrícula especificada
        $sql = "SELECT * FROM ALUMNO WHERE matricula = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $matricula);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verifica si se encontró el alumno
        if ($resultado->num_rows === 1) {
            $alumno = $resultado->fetch_assoc();

            // Mostrar el formulario con los datos del alumno cargados para su edición
            ?>
            <h1>Editar Alumno</h1>
            <form action="actualizar_alumno.php" method="post">
                <input type="hidden" name="matricula" value="<?php echo $alumno['matricula']; ?>">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $alumno['nombre_alum']; ?>" required>

                <label for="apaterno">Apellido Paterno</label>
                <input type="text" name="apaterno" id="apaterno" value="<?php echo $alumno['apaterno_alum']; ?>" required>

                <label for="amaterno">Apellido Materno</label>
                <input type="text" name="amaterno" id="amaterno" value="<?php echo $alumno['amaterno_alum']; ?>" required>

                <label for="cinta">Cinta</label>
                <input type="text" name="cinta" id="cinta" value="<?php echo $alumno['cinta']; ?>" required>

                <label for="calificacion">Calificación</label>
                <input type="number" name="calificacion" id="calificacion" value="<?php echo $alumno['calificacion']; ?>" required>

                <label for="torneo">Torneo</label>
                <input type="text" name="torneo" id="torneo" value="<?php echo $alumno['torneo']; ?>" required>

                <label for="clasificacion">Clasificación</label>
                <input type="text" name="clasificacion" id="clasificacion" value="<?php echo $alumno['clasificacion']; ?>" required>

                <label for="id_sensei">ID del Sensei</label>
                <input type="number" name="id_sensei" id="id_sensei" value="<?php echo $alumno['id_sensei']; ?>" required>

                <!-- Agrega aquí los demás campos del formulario para editar los datos del alumno -->

                <input type="submit" name="submit" value="Actualizar">
            </form>
            <?php
        } else {
            echo "Alumno no encontrado.";
        }

        $stmt->close();
    } else {
        echo "Error: Matrícula del alumno no especificada.";
    }

    $conn->close();
    ?>
</body>
</html>
