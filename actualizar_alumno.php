<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
    $apaterno = $_POST["apaterno"];
    $amaterno = $_POST["amaterno"];
    $cinta = $_POST["cinta"];
    $calificacion = $_POST["calificacion"];
    $torneo = $_POST["torneo"];
    $clasificacion = $_POST["clasificacion"];
    $id_sensei = $_POST["id_sensei"];

    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE ALUMNO SET nombre_alum = ?, apaterno_alum = ?, amaterno_alum = ?, cinta = ?, calificacion = ?, torneo = ?, clasificacion = ?, id_sensei = ? WHERE matricula = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssissii", $nombre, $apaterno, $amaterno, $cinta, $calificacion, $torneo, $clasificacion, $id_sensei, $matricula);

        if ($stmt->execute()) {
            // Actualización exitosa, redirige a la página de ver alumnos
            header("Location: ver_alumnos_sensei.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al actualizar alumno: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
}

?>
