<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Place your kit's code here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">
        <?php include("./drivers/menuIndex.php") ?>
        <main class="row">
            <div class="col-4">
                <h3 class="p-3">Registro de Personas</h3>

                <!-- AQUI MUESTRO SI TODO FUE BIEN -->
                <?php
                    include "./model/conexion.php";
                    include "./drivers/registro_persona.php";
                ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Ingrese su nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Ingrese su apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">Ingrese su dni:</label>
                        <input type="number" class="form-control" id="dni" name="dni">
                    </div>
                    <div class="mb-3">
                        <label for="fnacimiento" class="form-label">Ingrese su fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fnacimiento" name="fnacimiento">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Ingrese su correo:</label>
                        <input type="email" class="form-control" id="correo" name="correo">
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto" id="btnregistrar" value="ok" name="btnregistrar">Registrar</button>

                </form>
            </div>
            <div class="col-8 p-4">
                <h3 class="text-center">Visualizacion de tablas</h3>
                <table class="table text-center">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Nacimiento</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "./model/conexion.php";
                            $sql = $conexion->query("SELECT * FROM personas");
                            while ($datos = $sql->fetch_object()) { ?>

                                <tr>
                                <th scope="row"><?php echo $datos->id_persona; ?></th>
                                <td><?php echo $datos->nombre; ?></td>
                                <td><?php echo $datos->apellido; ?></td>
                                <td><?php echo $datos->dni; ?></td>
                                <td><?php echo $datos->fecha_nacimiento; ?></td>
                                <td><?php echo $datos->correo; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>

        </main>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>