<?php
// si el usuario presiona el boton quiero validar los datos
    if(!empty($_POST["btnregistrar"])){
        // validar que haya cargado todos los datos
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fnacimiento"]) and !empty($_POST["correo"])){
            echo '<div class="alert alert-success" role="alert">Todo OK!</div>';
            // Si cargo bien los datos los almaceno
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dni = $_POST["dni"];
            $fecha_nacimiento = $_POST["fnacimiento"];
            $correo = $_POST["correo"];

            $sql = $conexion->prepare('
                INSERT INTO personas (nombre, apellido, dni, fecha_nacimiento, correo)
                VALUES (?, ?, ?, ?, ?)
            ');
            
            // Vincular los parámetros
            $sql->bind_param('sssss', $nombre, $apellido, $dni, $fecha_nacimiento, $correo);
            
            // Asignar valores a las variables
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $fecha_nacimiento = $_POST['fnacimiento'];
            $correo = $_POST['correo'];
            
            // Ejecutar la consulta
            $sql->execute();
            
            // Verificar si la inserción fue exitosa
            if ($sql->affected_rows > 0) {
                echo "Registro insertado correctamente.";
            } else {
                echo "Error al insertar el registro: " . $conexion->error;
            }
            
            // Cerrar la consulta
            $sql->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Falta completar algunos campos</div>';
        }
    }

?>