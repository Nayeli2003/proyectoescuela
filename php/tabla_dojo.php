<?php
require "conexion.php";

// Consulta los datos de la tabla DOJO
$sql = "SELECT * FROM DOJO";
$resultado = $conn->query($sql);

// Verifica si hay resultados y devuelve el resultado para su uso en el archivo ver_dojo.php
if ($resultado && $resultado->num_rows > 0) {
    // El resultado se utilizará en el archivo ver_dojo.php para mostrar los datos en la tabla
    // Por lo tanto, no es necesario cerrar la conexión aquí.
    // El resultado se liberará y la conexión se cerrará en ver_dojo.php después de usarlo.
} else {
    // Si no hay resultados, puedes manejarlo aquí según tus necesidades.
    echo "No se encontraron datos en la tabla DOJO.";
}

?>
