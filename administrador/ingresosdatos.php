<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos libros</title>
    <?php
    require_once "../scrip_php/controlador/conexion_bd.php"; 
    ?> <!--Se llama la funcion de la base de datos-->
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
                </div>
            </div>
        </nav>
    </header>
    <!--Final de la barra-->
    <!--formulario inicio-->
    <br>
    <br>
    <section>
    <h2 class="text-center my-5">Ingreso de Autor</h2>
        <div class="container">
            <form name="autor" action="../administrador/ingresosdatos.php" method="POST">
                <div class="row">
                    <div class="col-3">
                        <label for="id_autor" class="form-label">Id Autor</label>
                        <input type="text" name="id_autor" id="id_autor" class="form-control"  required="" placeholder="Ingrese id">
                        <div class="invalid-feedback" id="invalido">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="nombre_autor" class="form-label">Nombre Autor</label>
                        <input type="text" name="nombre_autor" id="nombre_autor" class="form-control" placeholder="Ingrese el nombre del autor"  required="" minlength="1" maxlength="40">
                        <div class="invalid-feedback" id="invalido">
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="id_categoria" class="form-label">Id categoria</label>
                        <input type="text" name="id_categoria" id="id_categoria" class="form-control"  required="" placeholder="Ingrese id">
                        <div class="invalid-feedback" id="invalido">
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="nombre_categoria" class="form-label">Categoria</label>
                        <input type="text" name="nombre_categoria" class="form-control"  required="" placeholder="categoria">
                        <div class="invalid-feedback" id="invalido">
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="id_editorialr" class="form-label">Id editorial</label>
                        <input type="text" name="id_editorial" id="id_editorial" class="form-control"  required="" placeholder="Ingrese id">
                        <div class="invalid-feedback" id="invalido">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="nombre_editorial" class="form-label">editorial</label>
                        <input type="text" name="nombre_editorial" class="form-control" placeholder="Ingrese una editorial"  required="" minlength="1" maxlength="40">
                        <div class="invalid-feedback" id="invalido">
                        </div>
                    </div>
                    <br>
                    <div>
                    <button type="submit" name="registro" value="Ingresar" class="btn btn-primary">Ingresar datos</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        
    </script>
    <!--Fin del formulario-->
    <script src="../scrip_js/validacion_cliente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<!--Ingreso de datos a las tablas de categoria, autor y editorial se ingresan los datos que estan dentro del formulario de la pagina-->
<?php 
    $conn = db::connect();
    if (isset($_POST['registro'])) {
        // Categoria ingresos
        if (isset($_POST['nombre_categoria'])&& isset($_POST['id_categoria'])){
            $Categoria = $_POST['nombre_categoria'];
            $idCategoria = $_POST['id_categoria'];
            $insertarCategoria = "INSERT INTO Categoria VALUES ('$idCategoria','$Categoria')";
            if ($conn->query($insertarCategoria) === TRUE) {
                echo "Categoría ingresada correctamente.";
            } else {
                echo "Error al ingresar la categoría: " . $conn->error;
            }
        }
        // Verificar si se envió el autor y no cuente con la exepcion de la key de la base de datos
        if (isset($_POST['id_autor']) && isset($_POST['nombre_autor'])) {
            $idAutor = $_POST['id_autor'];
            $Nombre_autor = $_POST['nombre_autor'];
            $insertar = "INSERT INTO autor VALUES ('$idAutor', '$Nombre_autor')";
            if ($conn->query($insertar) === TRUE) {
                echo "Autor ingresado correctamente.";
            } else {
                echo "Error al ingresar el autor: " . $conn->error;
            }
        }
        if (isset($_POST['nombre_editorial']) && isset($_POST['id_Editorial'])) {
            $idEditorial = $_POST['id_Editorial'];
            $Nombre_editorial = $_POST['nombre_editorial'];
            $insertar = "INSERT INTO Editorial VALUES ('$idEditorial', '$Nombre_editorial')";
            if ($conn->query($insertar) === TRUE) {
                echo "Editorial ingresado correctamente.";
            } else {
                echo "Error al ingresar el Editorial: " . $conn->error;
            }
        }
    }
    $conn->close();
?>
