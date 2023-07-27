<?php
require "conexion.php";

// Función para verificar las credenciales del usuario
function login($conn, $matricula, $contraseña) {
    $matricula_like_sensei = '2' . substr($matricula, 1) . '%'; // Patrón para identificadores de Sensei (1xxxx)
    $matricula_like_admin = '1' . substr($matricula, 1) . '%';  // Patrón para identificadores de Administrador (2xxxx)

    $stmt = $conn->prepare("SELECT 'administrador' AS rol, id_admin AS id FROM ADMINISTRADOR WHERE id_admin LIKE ? AND contraseña = ?
                            UNION
                            SELECT 'sensei' AS rol, id_sensei AS id FROM SENSEI WHERE id_sensei LIKE ? AND contraseña = ?");
    if (!$stmt) {
        die("Error en la preparación de la consulta SQL: " . $conn->error);
    }

    $stmt->bind_param('ssss', $matricula_like_admin, $contraseña, $matricula_like_sensei, $contraseña); // Bind de los parámetros

    if (!$stmt->execute()) {
        die("Error en la ejecución de la consulta SQL: " . $stmt->error);
    }

    $stmt->bind_result($rol, $id);

    if ($stmt->fetch()) {
        return array('rol' => $rol, 'id' => $id);
    } else {
        return null;
    }
}

// Procesar el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['matricula'];
    $contraseña = $_POST['contraseña'];

    

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $usuario = login($conn, $matricula, $contraseña);

    if ($usuario) {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['rol'] = $usuario['rol'];
        $_SESSION['id'] = $usuario['id'];

        if ($usuario['rol'] === 'sensei') {
            header("Location: ../sensei.php"); // Redirige al Sensei a la página sensei.html
            exit(); // Importante: asegúrate de salir del script después de la redirección
        } elseif ($usuario['rol'] === 'administrador') {
            header("Location: ../admin.php"); // Redirige al Administrador a la página admin.html
            exit(); // Importante: asegúrate de salir del script después de la redirección
        } else {
            // Si el usuario no es Sensei ni Administrador, puedes redirigirlo a otra página de inicio o realizar otras acciones
            header("Location: ../pagina_de_inicio.php");
            exit(); // Importante: asegúrate de salir del script después de la redirección
        }
    } else {
        // Inicio de sesión fallido
        $logFile = fopen("error_log.log", "a");
        $errorInfo = "Inicio de sesión fallido para la matrícula: " . $matricula . "\n";
        fwrite($logFile, $errorInfo);
        fclose($logFile);

        header("Location: ../index.php"); // Redirige a la página de inicio de sesión con un mensaje de error
        
    }

    $conn->close(); // Cierra la conexión a la base de datos
}
?>



