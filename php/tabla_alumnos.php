<?php
require "conexion.php";

// Consulta los datos de la tabla ALUMNO
$sql = "SELECT * FROM ALUMNO";
$resultado = $conn->query($sql);

// Verifica si hay resultados y devuelve el resultado para su uso en el archivo ver_alumnos_sensei.php
if ($resultado && $resultado->num_rows > 0) {
    // El resultado se utilizará en el archivo ver_alumnos_sensei.php para mostrar los datos en la tabla
    // Por lo tanto, no es necesario cerrar la conexión aquí.
    // El resultado se liberará y la conexión se cerrará en ver_alumnos_sensei.php después de usarlo.
} else {
    // Si no hay resultados, puedes manejarlo aquí según tus necesidades.
    echo "No se encontraron datos.";
}

?>