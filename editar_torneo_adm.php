<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar TORNEO_ADM</title>
</head>
<body>
    <?php
    require "php/conexion.php"; // Incluir el archivo de conexión

    // Verifica si el ID del TORNEO_ADM se recibió en la URL
    if (isset($_GET["id_torneo_adm"])) {
        $id_torneo_adm = $_GET["id_torneo_adm"];

        // Consulta los datos del TORNEO_ADM con el ID especificado
        $sql = "SELECT * FROM TORNEO_ADM WHERE id_torneo_adm = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_torneo_adm);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verifica si se encontró el TORNEO_ADM
        if ($resultado->num_rows === 1) {
            $torneo_adm = $resultado->fetch_assoc();

            // Mostrar el formulario con los datos del TORNEO_ADM cargados para su edición
            ?>
            <h1>Editar TORNEO_ADM</h1>
            <form action="actualizar_torneo_adm.php" method="post">
                <input type="hidden" name="id_torneo_adm" value="<?php echo $torneo_adm['id_torneo_adm']; ?>">
                
                <label for="categoria">Categoría:</label>
                <select name="categoria" required>
                    <option value="Categoria menor de edad" <?php if ($torneo_adm['categoria'] === "Categoria menor de edad") echo "selected"; ?>>4-8 años cinta blanca - blanca y naranja</option>
                    <option value="Categoria menor de edad" <?php if ($torneo_adm['categoria'] === "Categoria menor de edad") echo "selected"; ?>>9-12 años cinta amarilla - naranja</option>
                    <option value="Categoria menor de edad" <?php if ($torneo_adm['categoria'] === "Categoria menor de edad") echo "selected"; ?>>13-18 años cinta verde - azul</option>
                    <option value="Categoria mayor de edad" <?php if ($torneo_adm['categoria'] === "Categoria meyor de edad") echo "selected"; ?>>18-22 años cinta cafe peso 70Kg - 80Kg</option>
                    <option value="Categoria mayor de edad" <?php if ($torneo_adm['categoria'] === "Categoria meyor de edad") echo "selected"; ?>>23-26 años cinta cafe - negro peso 80Kg - 90Kg</option>
                    <option value="Categoria mayor de edad" <?php if ($torneo_adm['categoria'] === "Categoria meyor de edad") echo "selected"; ?>>27-30 años cinta negra peso 85Kg - 95Kg</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>
                
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $torneo_adm['fecha_inicio']; ?>" required>

                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo $torneo_adm['fecha_fin']; ?>" required>

                <label for="id_admin">ID Admin</label>
                <input type="number" name="id_admin" id="id_admin" value="<?php echo $torneo_adm['id_admin']; ?>" required>

                <label for="id_dojo">ID Dojo</label>
                <input type="number" name="id_dojo" id="id_dojo" value="<?php echo $torneo_adm['id_dojo']; ?>" required>

                <!-- Agrega aquí los demás campos del formulario para editar los datos del TORNEO_ADM -->

                <input type="submit" name="submit" value="Actualizar">
            </form>
            <?php
        } else {
            echo "TORNEO_ADM no encontrado.";
        }

        $stmt->close();
    } else {
        echo "Error: ID del TORNEO_ADM no especificado.";
    }

    $conn->close();
    ?>
</body>
</html>
