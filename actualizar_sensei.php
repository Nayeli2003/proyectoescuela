<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $id_sensei = $_POST["id_sensei"];
    $nombre_sensei = $_POST["nombre_sensei"];
    $apaterno_sensei = $_POST["apaterno_sensei"];
    $amaterno_sensei = $_POST["amaterno_sensei"];
    $numero_tel = $_POST["numero_tel"];
    $contraseña = $_POST["contraseña"];
    $id_dojo = $_POST["id_dojo"];
    $id_admin = $_POST["id_admin"];

    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE SENSEI SET nombre_sensei = ?, apaterno_sensei = ?, amaterno_sensei = ?, numero_tel = ?, contraseña = ?, id_dojo = ?, id_admin = ? WHERE id_sensei = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssisiii", $nombre_sensei, $apaterno_sensei, $amaterno_sensei, $numero_tel, $contraseña, $id_dojo, $id_admin, $id_sensei);

        if ($stmt->execute()) {
            // Actualización exitosa, redirige a la página de ver senseis
            header("Location: ver_sensei.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al actualizar sensei: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
}
?>