<?php
// Verifica si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $id_sensei = $_POST["id_sensei"];
    $nombre_sensei = $_POST["nombre_sensei"];
    $apaterno_sensei = $_POST["apaterno_sensei"];
    $amaterno_sensei = $_POST["amaterno_sensei"];
    $numero_tel = $_POST["numero_tel"];
    $contraseña = $_POST["contraseña"];
    $id_dojo = $_POST["id_dojo"];
    $id_admin = $_POST["id_admin"];

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO SENSEI (id_sensei, nombre_sensei, apaterno_sensei, amaterno_sensei, numero_tel, contraseña, id_dojo, id_admin) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isssisii", $id_sensei, $nombre_sensei, $apaterno_sensei, $amaterno_sensei, $numero_tel, $contraseña, $id_dojo, $id_admin);

        if ($stmt->execute()) {
            // Inserción exitosa, redirige a la página de ver senseis
            header("Location: ../ver_sensei.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al agregar sensei: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión
}

