<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar DOJO</title>
</head>
<body>
    <?php
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Verifica si el ID del DOJO se recibió en la URL
    if (isset($_GET["id_dojo"])) {
        $id_dojo = $_GET["id_dojo"];

        // Consulta los datos del DOJO con el ID especificado
        $sql = "SELECT * FROM DOJO WHERE id_dojo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_dojo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verifica si se encontró el DOJO
        if ($resultado->num_rows === 1) {
            $dojo = $resultado->fetch_assoc();

            // Mostrar el formulario con los datos del DOJO cargados para su edición
            ?>
            <h1>Editar DOJO</h1>
            <form action="actualizar_dojo.php" method="post">
                <input type="hidden" name="id_dojo" value="<?php echo $dojo['id_dojo']; ?>">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $dojo['nombre']; ?>" required>

                <label for="calle">Calle</label>
                <input type="text" name="calle" id="calle" value="<?php echo $dojo['calle']; ?>" required>

                <label for="C_P">C.P</label>
                <input type="number" name="C_P" id="C_P" value="<?php echo $dojo['C_P']; ?>" required>

                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado" value="<?php echo $dojo['estado']; ?>" required>

                <label for="municipio">Municipio</label>
                <input type="text" name="municipio" id="municipio" value="<?php echo $dojo['municipio']; ?>" required>

                <label for="numero_tel">Número Telefónico</label>
                <input type="number" name="numero_tel" id="numero_tel" value="<?php echo $dojo['numero_tel']; ?>" required>

                <!-- Agrega aquí los demás campos del formulario para editar los datos del DOJO -->

                <input type="submit" name="submit" value="Actualizar">
            </form>
            <?php
        } else {
            echo "DOJO no encontrado.";
        }

        $stmt->close();
    } else {
        echo "Error: ID del DOJO no especificado.";
    }

    $conn->close();
    ?>
</body>
</html>
