<?php
require "conexion.php";

// Consulta los datos de la tabla SENSEI
$sql = "SELECT * FROM SENSEI";
$resultado = $conn->query($sql);

// Verifica si hay resultados y devuelve el resultado para su uso en el archivo ver_senseis.php
if ($resultado && $resultado->num_rows > 0) {
    // No es necesario cerrar la conexión aquí, ya que el resultado se utilizará más adelante en el código.
} else {
    // Si no hay resultados, puedes manejarlo aquí según tus necesidades.
    echo "No se encontraron datos.";
}
?>