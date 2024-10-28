<?php
    // Configuración de la conexión
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mi_crud";

    // Conexión al servidor MySQL
    $conexion = new mysqli($servername, $username, $password);

    // Verificación de la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Crear base de datos si no existe
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if ($conexion->query($sql) === TRUE) {
        // echo "Base de datos creada o ya existe.<br>";
    } else {
        die("Error al crear la base de datos: " . $conexion->error);
    }

    // Selecciono la base de datos y configura charset para caracteres especiales
    $conexion->select_db($database);
    $conexion->set_charset("utf8");

    // Crear la tabla "personas" si no existe
    $sql = "CREATE TABLE IF NOT EXISTS personas (
        id_persona INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        apellido VARCHAR(50) NOT NULL,
        dni VARCHAR(20) NOT NULL,
        fecha_nacimiento DATE,
        correo VARCHAR(100)
    )";
    if ($conexion->query($sql) === TRUE) {
        // echo "Tabla 'personas' creada o ya existe.<br>";
    } else {
        die("Error al crear la tabla: " . $conexion->error);
    }

    // Verifico si la tabla "personas" está vacía
    $sql = "SELECT COUNT(*) AS count FROM personas";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    if ($row['count'] == 0) {
        // Insertar registros de muestra
        $sql = "INSERT INTO personas (nombre, apellido, dni, fecha_nacimiento, correo) VALUES
            ('Juan', 'Pérez', '12345678', '1990-01-01', 'juan.perez@example.com'),
            ('María', 'González', '87654321', '1992-02-02', 'maria.gonzalez@example.com'),
            ('Carlos', 'López', '23456789', '1988-03-03', 'carlos.lopez@example.com'),
            ('Ana', 'Martínez', '34567890', '1995-04-04', 'ana.martinez@example.com')";
        
        if ($conexion->query($sql) === TRUE) {
            // echo "Registros de muestra insertados en la tabla 'personas'.<br>";
        } else {
            die("Error al insertar registros de muestra: " . $conexion->error);
        }
    } else {
        // echo "La tabla 'personas' ya contiene datos.<br>";
    }

    // Cerrar la conexión
    // $conn->close();
?>