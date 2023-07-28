<?php
// Verifica si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $id_torneo_adm = $_POST["id_torneo_adm"];
    $categoria = $_POST["categoria"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $id_admin = $_POST["id_admin"];
    $id_dojo = $_POST["id_dojo"];


    
    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO TORNEO_ADM (id_torneo_adm, categoria, fecha_inicio, fecha_fin, id_admin, id_dojo) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isssii", $id_torneo_adm, $categoria, $fecha_inicio, $fecha_fin, $id_admin, $id_dojo);

        if ($stmt->execute()) {
            // Inserción exitosa, redirige a la página de ver torneos administradores
            header("Location: ../ver_torneos.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al agregar torneo administrador: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
}
