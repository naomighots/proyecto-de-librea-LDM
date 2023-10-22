<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <?php
    require_once "../scrip_php/controlador/conexion_bd.php";
    ?>
    <link rel="stylesheet" href="../css/style_adm.css" class="css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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
                            <a class="nav-link" href="../html/formulario_cliente.html">Clientes</a>
                        </li>
                        <li class="nav-item" id="link">
                            <a class="nav-link" href="../html/formulario_libro.html">Libros</a>
                        </li>
                        <li class="nav-item" id="link">
                            <a class="nav-link" aria-current="page" href="../html/prestamos.php">Prestamo</a>
                        </li>
                        <li class="nav-item" id="link">
                            <a class="nav-link" aria-current="page" href="#">Devolucion</a>
                        </li>
                        <li class="nav-item">
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br><br><br>
    <section>
    <div class="wrapper">
        <div class="container">
        <h2>Libros ingresados</h2>
        <br>
        <form method="get" action="vistas_libro.php" id ="formulario_busqueda">
            <label for="titulo">Buscar libro:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Título del libro">
            <input type="submit" value="Buscar" class="btn btn-primary" id="buscar">
        </form>
        <section>
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
            
        </section>
        <!--Tabla de vista general-->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Fecha de lanzamiento</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Editorial</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = db::connect();            
                        $sql = "SELECT idLibros, Titulo, Fecha_lanzamientos, Nombre_autor,Categoria,Editorial FROM Libros";
                        $result = $conn->query($sql);
                        
                        if ($result !== false && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row['idLibros']."</td>";
                                echo "<td>".$row['Titulo']."</td>";
                                echo "<td>".$row['Fecha_lanzamientos'] ."</td>";
                                echo "<td>".$row['Nombre_autor']."</td>";
                                echo "<td>".$row['Categoria']."</td>";
                                echo "<td>".$row['Editorial']."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No se encontraron datos</td></tr>";
                        }
                        $conn->close(); 
                        ?>
                </tbody>
            </table>
            <div>
                <a href="formulario_libro.html" class="btn btn-seleccion btn-center">Ingreso de Libros</a>
            </div>
        </div>
    </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>