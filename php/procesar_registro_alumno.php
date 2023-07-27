<?php
// Verifica si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "conexion.php"; // Incluir el archivo de conexión

    // Obtener los datos del formulario
    $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
    $apaterno = $_POST["apaterno"];
    $amaterno = $_POST["amaterno"];
    $cinta = $_POST["cinta"];
    $calificacion = $_POST["calificacion"];
    $torneo = $_POST["torneo"];
    $clasificacion = $_POST["clasificacion"];
    $id_sensei = $_POST["id_sensei"];

    
// Verificar el valor de torneo antes de la inserción

    echo "Torneo: " . $torneo . "<br>";

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO ALUMNO (matricula, nombre_alum, apaterno_alum, amaterno_alum, cinta, calificacion, torneo, clasificacion, id_sensei) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
$stmt->bind_param("issssissi", $matricula, $nombre, $apaterno, $amaterno, $cinta, $calificacion, $torneo, $clasificacion, $id_sensei);

if ($stmt->execute()) {
    // Inserción exitosa, redirige a la página de ver alumnos
    header("Location: ../ver_alumnos_sensei.php");
    exit();
} else {
    // Error al ejecutar la consulta
    echo "Error al agregar alumno: " . $stmt->error;
}
$stmt->close();
} else {
// Error en la preparación de la consulta
echo "Error en la preparación de la consulta: " . $conn->error;
}


    $conn->close(); // Cerrar la conexión
}
