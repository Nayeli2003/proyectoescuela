<?php

// Verifica si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_torneo_adm"])) {

    require "php/conexion.php";

    // Obtener los datos del formulario
    $id_torneo_adm = $_POST["id_torneo_adm"];
    $categoria = $_POST["categoria"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $id_admin = $_POST["id_admin"];

    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE TORNEO_ADM SET id_torneo_adm = ?, categoria = ?, fecha_inicio = ?, fecha_fin = ?, id_admin = ? WHERE id_torneo_adm = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isssii", $id_torneo_adm, $categoria, $fecha_inicio, $fecha_fin, $id_admin, $id_torneo_adm);

        if ($stmt->execute()) {
            // Actualización exitosa, redirige a la página de ver torneos
            header("Location: ver_torneos.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al actualizar torneo: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
} else {
    // Redirige a la página de ver torneos si no se envió el formulario o el ID del torneo no se especificó
    header("Location: ver_torneos.php");
    exit();
}
?>
