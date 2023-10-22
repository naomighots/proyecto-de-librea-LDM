
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso cliente</title>
    <!--Se llama a la funcion para la conexion de la base de datos-->
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
        Ingreso de cliente
        </div>
        <div class="card-body">
        <form action="../administrador/ingresoCliente.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
            <label for="rut_cliente" class="form-label">Rut del cliente</label>
            <input type="text" name="rut_cliente" id="rut_cliente" class="form-control"  required="" placeholder="55555555-5"pattern="[0-9]{8}-[0-9,k]{1}">
            </div>
            <div class="mb-3">
            <label for="nombre_cliente" class="form-label">Nombre del cliente</label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" placeholder="Ingrese el nombre"  required="" minlength="1" maxlength="40">
            </div>
            <div class="mb-3">
            <label for="apellido_paterno" class="form-label">Apellido paterno del cliente</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="Ingrese el apellido paterno" required="" minlength="1" maxlength="40">
            </div>
            <div class="mb-3">
            <label for="apellido_materno" class="form-label">Apellido materno del cliente</label>
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" placeholder="Ingrese el apellido" required="" minlength="1" maxlength="40">
            </div>
            <div class="mb-3">
            <label for="direcion_cliente" class="form-label">Dirección del cliente</label>
            <input type="text" name="direccion_cliente" id="direccion_cliente" class="form-control" placeholder="Ingrese la dirección" required="" minlength="1" maxlength="40">
            </div>
            <div class="mb-3">
            <label for="telefono_cliente" class="form-label">Telefono del cliente</label>
                <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control" required="" placeholder="998977896">
            </div>
                <button type="submit" name="registro" class="btn btn-primary">Ingresar cliente</button>
        </form>

        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
    </div>
    <div class="col-md-7">
        <!--en la tabla se mostrara los datos de los clientes dentro de la base de datos-->
    <table class="table">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = db::connect();            
                        $sql = "SELECT rut, Nombre, Apellido_paterno, Apellido_materno, Telefono, Direccion FROM persona";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["rut"]."</td>";
                                echo "<td>".$row["Nombre"]."</td>";
                                echo "<td>".$row["Apellido_paterno"]."</td>";
                                echo "<td>".$row["Apellido_materno"]."</td>";
                                echo "<td>".$row["Telefono"]."</td>";
                                echo "<td>".$row["Direccion"]."</td>";
                                echo "</tr>";
                                
                            }
                            
                        } else {
                            echo "<tr><td colspan='6'>No se encontraron datos</td></tr>";
                        }
                        $conn->close(); 
                        ?>
                        
                </tbody>
            </table>
        </div>
    </div>
    </section>
</body>
    <!--Fin del formulario-->
    <script src="../scrip_js/validacion_cliente.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<!--Se ingresara los datos del cliente a la base de datos-->
<?php 
    $conn = db::connect();
    if(isset($_POST['registro']))
    {
        $rut=$_POST['rut_cliente'];
        $nombre=$_POST['nombre_cliente'];
        $apellido_paterno =$_POST['apellido_paterno'];
        $apellido_materno =$_POST['apellido_materno'];
        $telefono=$_POST['telefono_cliente'];
        $direccion=$_POST['direccion_cliente'];
        $insertar="INSERT INTO persona VALUES ('$rut','$nombre','$apellido_paterno','$apellido_materno','$telefono','$direccion')";
        $ejecutarDatos= mysqli_query($conn,$insertar);
    }
    $conn->close();
?>