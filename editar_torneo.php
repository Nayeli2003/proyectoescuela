<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Torneo</title>
</head>

<body>
    <?php
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Verifica si el ID del torneo se recibió en la URL
    if (isset($_GET["id_torneo"])) {
        $id_torneo = $_GET["id_torneo"];

        // Consulta los datos del torneo con el ID especificado
        $sql = "SELECT * FROM TORNEO WHERE id_torneo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_torneo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verifica si se encontró el torneo
        if ($resultado->num_rows === 1) {
            $torneo = $resultado->fetch_assoc();

            // Mostrar el formulario con los datos del torneo cargados para su edición
            ?>
            <h1>Editar Torneo</h1>
            <form action="actualizar_torneo.php" method="post">
                <input type="hidden" name="id_torneo" value="<?php echo $torneo['id_torneo']; ?>">
                <label for="categoria">Categoría:</label>
                <select name="categoria" required>
                    <option value="Categoria menor de edad" <?php if ($torneo['categoria'] === "Categoria menor de edad") echo 'selected'; ?>>4-8 años cinta blanca - blanca y naranja</option>
                    <option value="Categoria menor de edad" <?php if ($torneo['categoria'] === "Categoria menor de edad") echo 'selected'; ?>>9-12 años cinta amarilla - naranja</option>
                    <option value="Categoria menor de edad" <?php if ($torneo['categoria'] === "Categoria menor de edad") echo 'selected'; ?>>13-18 años cinta verde - azul</option>
                    <option value="Categoria meyor de edad" <?php if ($torneo['categoria'] === "Categoria meyor de edad") echo 'selected'; ?>>18-22 años cinta cafe peso 70Kg - 80Kg</option>
                    <option value="Categoria meyor de edad" <?php if ($torneo['categoria'] === "Categoria meyor de edad") echo 'selected'; ?>>23-26 años cinta cafe - negro peso 80Kg - 90Kg</option>
                    <option value="Categoria meyor de edad" <?php if ($torneo['categoria'] === "Categoria meyor de edad") echo 'selected'; ?>>27-30 años cinta negra peso 85Kg - 95Kg</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>

                <label for="fecha_inicio">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $torneo['fecha_inicio']; ?>" required>

                <label for="fecha_fin">Fecha de Fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo $torneo['fecha_fin']; ?>" required>

                <label for="matricula">Matrícula</label>
                <input type="number" name="matricula" id="matricula" value="<?php echo $torneo['matricula']; ?>" required>

                <label for="id_admin">ID Admin</label>
                <input type="number" name="id_admin" id="id_admin" value="<?php echo $torneo['id_admin']; ?>" required>

                <!-- Agrega aquí los demás campos del formulario para editar los datos del torneo -->

                <input type="submit" name="submit" value="Actualizar">
            </form>
            <?php
        } else {
            echo "Torneo no encontrado.";
        }

        $stmt->close();
    } else {
        echo "Error: ID del torneo no especificado.";
    }

    $conn->close();
    ?>
</body>

</html>
