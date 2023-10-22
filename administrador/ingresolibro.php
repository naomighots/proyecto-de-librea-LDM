
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresos de libros</title>
    <?php
    require_once "../scrip_php/controlador/conexion_bd.php";
    ?> <!--Se llama la funcion que conecta a la bae de datos-->
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
    <br>
    <div class="container">
<div class="row">
    <div class="col-md-4">
    <div class="card">
        <div class="card-header">
        Ingreso de Libro
        <a href="../administrador/ingresosdatos.php">Ingresar datos del autor y su categoria</a>
        </div>
        <div class="card-body">
        <form action="../administrador/ingresoEditorial.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_libro" class="form-label">Id Libro</label>
                <input type="text" name="id_libro" id="id_libro" class="form-control" placeholder="Ingrese Id">
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del libro</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ingrese título del libro"  required="" minlength="1" maxlength="40">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de Lanzamiento</label>
                <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Ingrese fecha de lanzamiento" required="" minlength="1" maxlength="40">
            </div>
            <div class="mb-3">
                <label for="ejemplares" class="form-label">Ejemplares</label>
                <input type="text" name="ejemplares" id="ejemplares" class="form-control" placeholder="Ingrese el número de ejemplares" required="" minlength="1" maxlength="40">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del libro</label>
                <input type="file" class="form-control"  name="imagen"id="imagen"aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="ingrese una breve descripción">
            </div>
            <form method="post">
                <div class="mb-3">
                <label for="id_autor" class="form-label">Id Autor</label>
                <!--Se mostrara los datos al usuario a su ves se rellenen los campos y se podra enviar a la consulta php-->
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_autor">
                <?php
                    $conn = db::connect();            
                    $sql = "SELECT DISTINCT idAutor, Nombre_autor FROM autor";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["idAutor"] . "'>" . $row["idAutor"]." ". $row["Nombre_autor"] . "</option>";
                            }
                        }
                    $conn->close();
                ?><!--el select mostrara los datos que se an ingresado a la base de datos en conjunto con su id y nombre espesifico-->
                </select>
                </div>
                <div class="mb-3">
                <label for="id_categoria" class="form-label">Id Categoria</label>
                <!--Se mostrara los datos al usuario a su ves se rellenen los campos y se podra enviar a la consulta php-->
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_categoria">
                <?php
                    $conn = db::connect();            
                    $sql = "SELECT DISTINCT idCategoria, Categoria FROM Categoria";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["idCategoria"] . "'>" . $row["idCategoria"]." ". $row["Categoria"] . "</option>";
                            }
                        }
                    $conn->close();
                ?><!--el select mostrara los datos que se an ingresado a la base de datos en conjunto con su id y nombre espesifico-->
                </select>
                </div>
                <div class="mb-3">
                <label for="id_editorial" class="form-label">Id Editorial</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_editorial"> 
                <!--Se mostrara los datos al usuario a su ves se rellenen los campos y se podra enviar a la consulta php-->
                <?php
                    $conn = db::connect();            
                    $sql = "SELECT DISTINCT idEditorial, Editorial FROM Editorial";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["idEditorial"] . "'>" . $row["idEditorial"]." ". $row["Editorial"] . "</option>";
                            }
                        }
                    $conn->close();
                ?><!--el select mostrara los datos que se an ingresado a la base de datos en conjunto con su id y nombre espesifico-->
                </select>
                </div>
            </form>
        </form>
        <button type="submit" name="registro" class="btn-primary">Ingresar libro</button>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
    </div>
    <div class="col-md-7">
    <table class="table">
        <thead>
            <tr>
                <th>Id Libro</th>
                <th>Título</th>
                <th>Fecha de Lanzamiento</th>
                <th>Ejemplares</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Id Autor</th>
            </tr>
        </thead>
                <tbody> 
                <!--se muestran los datos al usuario con los datos anteriormente ingresados gracis a esto el usuario podra ver la informacion ya recopilada-->
                <?php
                $conn = db::connect();
                $sql = "SELECT Libros.idLibros,Libros.Titulo, Libros.Fecha_lanzamientos, Autor.Nombre_autor, 
                Categoria.Categoria, Editorial.Editorial FROM Libros
                INNER JOIN Autor ON Libros.Autor_idAutor = Autor.idAutor
                INNER JOIN Categoria ON Libros.Categoria_idCategoria = Categoria.idCategoria
                INNER JOIN Editorial ON Libros.Editorial_idEditorial = Editorial.idEditorial";
                if (isset($_GET['titulo']) && !empty($_GET['titulo'])) {
                    $search = $_GET['titulo'];
                    $sql .= " WHERE Libros.Titulo LIKE '%titulo%'";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Fecha de lanzamiento</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Editorial</th>
                        </tr>";
                        while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['idLibros'] . "</td>";
                        echo "<td>" . $row['Titulo'] . "</td>";
                        echo "<td>" . $row['Fecha_lanzamientos'] . "</td>";
                        echo "<td>" . $row['Nombre_autor'] . "</td>";
                        echo "<td>" . $row['Categoria'] . "</td>";
                        echo "<td>" . $row['Editorial'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "";
                }
                ?>   
                </tbody>
            </table>
        </div>
    </div>
    </section>
</body>
    
    <!--Fin del formulario-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../scrip_js/validacion_cliente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<!--Se crea la funcion para poder ingresar los datos a la tabla libros-->
<?php 
    $conn = db::connect();
    if(isset($_POST['registro']))
    {
        $id_libro=$_POST['id_libro'];
        $titulo=$_POST['titulo'];
        $fecha=$_POST['fecha'];
        $ejemplares =$_POST['ejemplares'];
        $imagen=$_POST['imagen'];
        $descripcion=$_POST['descripcion'];
        $id_autor = $_POST['id_autor'];
        $id_categoria = $_POST['id_categoria'];
        $id_editorial = $_POST['id_editorial'];
        $insertar="INSERT INTO Libros (idLibros, Titulo, Fecha_lanzamientos, Ejemplares, Imagen, Descripcion,idAutor,idCategoria,idEditorial)
        VALUES ('$id_libro', '$titulo', '$fecha', '$ejemplares', '$imagen', '$descripcion', '$id_autor', '$id_categoria', '$id_editorial')";
        $ejecutarDatos= mysqli_query($conn,$insertar);
    }
    $conn->close();
?>