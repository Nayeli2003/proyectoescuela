<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $id_dojo = $_POST["id_dojo"];
    $nombre = $_POST["nombre"];
    $calle = $_POST["calle"];
    $C_P = $_POST["C_P"];
    $estado = $_POST["estado"];
    $municipio = $_POST["municipio"];
    $numero_tel = $_POST["numero_tel"];

    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE DOJO SET nombre = ?, calle = ?, C_P = ?, estado = ?, municipio = ?, numero_tel = ? WHERE id_dojo = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssissii", $nombre, $calle, $C_P, $estado, $municipio, $numero_tel, $id_dojo);

        if ($stmt->execute()) {
            // Actualización exitosa, redirige a la página de ver dojo
            header("Location: ver_dojo.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al actualizar DOJO: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
}
?>
