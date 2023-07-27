<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $id_torneo = $_POST["id_torneo"];
    $categoria = $_POST["categoria"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $matricula = $_POST["matricula"];
    $id_admin = $_POST["id_admin"];

    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE TORNEO SET id_torneo = ?, categoria = ?, fecha_inicio = ?, fecha_fin = ?, matricula = ?, id_admin = ? WHERE id_torneo = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isiiii", $id_torneo, $categoria, $fecha_inicio, $fecha_fin, $matricula, $id_admin, $id_torneo);

        if ($stmt->execute()) {
            // Actualización exitosa, redirige a la página de ver torneos
            header("Location: ver_torneos_sensei.php");
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
}

?>