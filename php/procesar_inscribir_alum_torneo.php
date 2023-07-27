<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $id_torneo = $_POST["id_torneo"];
    $categoria = $_POST["categoria"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $matricula = $_POST["matricula"];
    $id_admin = $_POST["id_admin"];

    // Verificar si todos los campos del formulario están completos
    if ($id_torneo && $categoria && $fecha_inicio && $fecha_fin && $matricula && $id_admin) {
        // Preparar y ejecutar la consulta de inserción
        $sql = "INSERT INTO TORNEO (id_torneo, categoria, fecha_inicio, fecha_fin, matricula, id_admin) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("isssii", $id_torneo, $categoria, $fecha_inicio, $fecha_fin, $matricula, $id_admin);

            if ($stmt->execute()) {
                // Inserción exitosa, redirige a la página de ver torneos
                header("Location: ../ver_torneos_sensei.php");
                exit();
            } else {
                // Error al ejecutar la consulta
                echo "Error al inscribir al alumno en el torneo: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Error en la preparación de la consulta
            echo "Error en la preparación de la consulta: " . $conn->error;
        }
    } else {
        echo "Debes completar todos los campos del formulario.";
    }

    $conn->close(); // Cerrar la conexión
}
?>
