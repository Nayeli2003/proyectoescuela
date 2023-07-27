<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["matricula"])) {
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Obtener la matrícula del alumno a eliminar
    $matricula = $_GET["matricula"];

    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM ALUMNO WHERE matricula = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $matricula);

        if ($stmt->execute()) {
            // Eliminación exitosa, redirige a la página de ver alumnos
            header("Location: ver_alumnos_sensei.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al eliminar alumno: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
} else {
    // Redirige a la página de ver alumnos si no se proporcionó la matrícula
    header("Location: ver_alumnos_sensei.php");
    exit();
}
?>

