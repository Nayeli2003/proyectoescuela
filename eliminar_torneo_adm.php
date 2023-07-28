<?php

// Verifica si se recibió el ID del torneo a eliminar en la URL
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id_torneo_adm"])) {
    require "php/conexion.php"; // Incluir el archivo de conexión
    // Obtener el ID del torneo a eliminar
    $id_torneo_adm = $_GET["id_torneo_adm"];

    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM TORNEO_ADM WHERE id_torneo_adm = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_torneo_adm);

        if ($stmt->execute()) {
            // Eliminación exitosa, redirige a la página de ver torneos
            header("Location: ver_torneos.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al eliminar el torneo: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
} else {
    // Redirige a la página de ver torneos si no se proporcionó el ID del torneo
    header("Location: ver_torneos.php");
    exit();
}
?>
