<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista cliente</title>
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
        </nav>
    </header>
    <br><br><br>
    <section>
    <div class="wrapper">
        <div class="container">
        <h2>Datos del Cliente</h2>

</html>