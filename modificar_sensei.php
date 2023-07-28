<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar SENSEI</title>
</head>
<body>
    <?php
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Verifica si el ID del SENSEI se recibió en la URL
    if (isset($_GET["id_sensei"])) {
        $id_sensei = $_GET["id_sensei"];

        // Consulta los datos del SENSEI con el ID especificado
        $sql = "SELECT * FROM SENSEI WHERE id_sensei = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_sensei);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verifica si se encontró el SENSEI
        if ($resultado->num_rows === 1) {
            $sensei = $resultado->fetch_assoc();

            // Mostrar el formulario con los datos del SENSEI cargados para su edición
            ?>
            <h1>Editar SENSEI</h1>
            <form action="actualizar_sensei.php" method="post">
                <input type="hidden" name="id_sensei" value="<?php echo $sensei['id_sensei']; ?>">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $sensei['nombre_sensei']; ?>" required>

                <label for="apaterno">Apellido Paterno</label>
                <input type="text" name="apaterno" id="apaterno" value="<?php echo $sensei['apaterno_sensei']; ?>" required>

                <label for="amaterno">Apellido Materno</label>
                <input type="text" name="amaterno" id="amaterno" value="<?php echo $sensei['amaterno_sensei']; ?>" required>

                <label for="numero_tel">Número Telefónico</label>
                <input type="number" name="numero_tel" id="numero_tel" value="<?php echo $sensei['numero_tel']; ?>" required>

                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" value="<?php echo $sensei['contraseña']; ?>" required>

                <label for="id_dojo">ID Dojo</label>
                <input type="number" name="id_dojo" id="id_dojo" value="<?php echo $sensei['id_dojo']; ?>" required>

                <label for="id_admin">ID Administrador</label>
                <input type="number" name="id_admin" id="id_admin" value="<?php echo $sensei['id_admin']; ?>" required>

                <!-- Agrega aquí los demás campos del formulario para editar los datos del SENSEI -->

                <input type="submit" name="submit" value="Actualizar">
            </form>
            <?php
        } else {
            echo "SENSEI no encontrado.";
        }

        $stmt->close();
    } else {
        echo "Error: ID del SENSEI no especificado.";
    }

    $conn->close();
    ?>
</body>
</html>
