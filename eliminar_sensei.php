<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id_sensei"])) {
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Obtener el ID del SENSEI a eliminar
    $id_sensei = $_GET["id_sensei"];

    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM SENSEI WHERE id_sensei = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_sensei);

        if ($stmt->execute()) {
            // Eliminación exitosa, redirige a la página de ver senseis
            header("Location: ver_sensei.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al eliminar SENSEI: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
} else {
    // Redirige a la página de ver senseis si no se proporcionó el ID del SENSEI
    header("Location: ver_sensei.php");
    exit();
}
?>
