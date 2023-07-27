<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id_dojo"])) {
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Obtener el ID del DOJO a eliminar
    $id_dojo = $_GET["id_dojo"];

    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM DOJO WHERE id_dojo = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_dojo);

        if ($stmt->execute()) {
            // Eliminación exitosa, redirige a la página de ver dojo
            header("Location: ver_dojos.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al eliminar DOJO: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
} else {
    // Redirige a la página de ver dojo si no se proporcionó el ID del DOJO
    header("Location: ver_dojo.php");
    exit();
}
?>
