<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
    <?php
    require_once "../scrip_php/controlador/conexion_bd.php";
    ?>
    <link rel="stylesheet" href="../css/style_adm.css" class="css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!--Inicio de la barra-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top backgroun_barra" >
            <div class="container-fluid">
                <a class="navbar-brand " href="index.html" style="font-size: bold;" id="link">Biblioteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item" id="link">
                            <a class="nav-link" href="../administrador/ingresoCliente.php">Clientes</a>
                        </li>
                        <li class="nav-item" id="link">
                            <a class="nav-link" href="../administrador/ingresolibro.php">Libros</a>
                        </li>
                        <li class="nav-item" id="link">
                            <a class="nav-link" aria-current="page" href="../html/prestamos.php">Prestamo</a>
                        </li>
                        <li class="nav-item" id="link">
                            <a class="nav-link" aria-current="page" href="#">Devolucion</a>
                        </li>
                    </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--Final de la barra-->
    <!--formulario inicio-->
    <br>
    <section>
        <h2 class="text-center my-5">Prestamos</h2>
        <div class="container">
            <form action="" method="post" class="Prestamos-libros">
                <div class="row">
                    <form method="POST">
                        <div class="col-3">
                        <label for="rut_cliente" class="form-label">Rut del cliente:</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rut" onchange="this.form.submit()">
                            <?php
                            $conn = db::connect();            
                            $sql = "SELECT DISTINCT rut FROM Persona";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["rut"] . "'>" . $row["rut"] . "</option>";
                                }
                            }
                            $conn->close();
                            ?>
                            </select>
                            <div class="col-2">
                                <div class="invalid-feedback" id="invalido"></div>
                            </div>
                        </div>
                        <?php 
                            $apellido_paterno =" ";
                            $apellido_materno = " ";
                            $nombre_cliente = " ";
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                if (isset($_POST["rut"])) {
                                    $Rut = $_POST["rut"];
                                    $conn = db::connect();
                                    $sql = "SELECT * FROM Persona WHERE rut = '$Rut'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $apellido_paterno = $row["Apellido_paterno"];
                                        $apellido_materno = $row["Apellido_materno"];
                                        $nombre_cliente = $row["Nombre"];
                                    } else {
                                    echo "<p>No se encontraron datos para el RUT seleccionado.</p>";
                                    }
                                    $conn->close();
                                }
                            }  
                        ?>
                        </form>
                    <div class="col-3">
                        <label for="apellido_paterno" class="form-label">Nombre del cliente:</label>
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="<?php echo $nombre_cliente ?? ''; ?>"readonly>
                    </div>
                    <div class="col-3">
                        <label for="apellido_materno" class="form-label">Apellido paterno del cliente</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo $apellido_paterno?? ''; ?>"readonly>
                    </div>
                    <div class="col-3">
                        <label for="rut_cliente" class="form-label">Apellido materno del cliente</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?php echo $apellido_materno ?? ''; ?>" readonly>
                    </div>
                    <div class="col-3">
                        <label for="Titulo" class="form-label">Titulo del libro</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <?php
                                $conn = db::connect();            
                                $sql = "SELECT DISTINCT Titulo FROM Libros";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["Titulos"] . "'>" . $row["Titulos"] . "</option>";
                                    }
                                }
                            $conn->close();
                            ?>
                        </select>
                            <?php 
                            $titulo=" ";
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                if (isset($_POST["titulo"])) {
                                    $Rut = $_POST["titulo"];
                                    $conn = db::connect();
                                    $sql = "SELECT * FROM libros WHERE Titulo = '$titulo'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $apellido_paterno = $row["Apellido_paterno"];
                                        $apellido_materno = $row["Apellido_materno"];
                                        $nombre_cliente = $row["Nombre"];
                                    } else {
                                    echo "<p>No se encontraron datos del libro seleccionado.</p>";
                                    }
                                    $conn->close();
                                }
                            }  
                        ?>
                        <div class="invalid-feedback" id="invalido"></div>
                    </div>
                    <div class="col-3">
                        <label for="ID" class="form-label">ID del libro</label>
                        <input type="text" class="form-control" id="id" name="id" readonly> 
                    </div>
                    <div>
                        <button type="submit" class="btn-primary" name="cliente">Ingresar</button>
                    </div>
            </form>
        </div>
    </section>
    <br>
    <br>

    <!--Fin del formulario-->
    <script src="../scrip_js/validacion_cliente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>