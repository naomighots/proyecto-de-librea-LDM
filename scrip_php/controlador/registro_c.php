<?php 
    $conexion = include("conexion_bd.php");

    if(isset($_POST["cliente"])){
        if(strlen($_POST["nombre_cliente"]) >=1 && 
        strlen($_POST["apellido_paterno"]) >=1 &&
        strlen($_POST["apellido_materno"]) >=1 &&
        strlen($_POST["rut_cliente"]) >=1 &&
        strlen($_POST["direccion_cliente"]) >=1 &&
        strlen($_POST["telefono_cliente"]) >=1)
        {
            $nombre_cliente = trim($_POST["nombre_cliente"]);
            $apellido_paterno = trim($_POST["apellido_paterno"]);
            $apellido_materno = trim($_POST["apellido_materno"]);
            $rut_cliente = trim($_POST["rut_cliente"]);
            $direccion_cliente = trim($_POST["direccion_cliente"]);
            $telefono_cliente = trim($_POST["telefono_cliente"]);
            $cnn = $conexion->prepare("INSERT INTO Persona (rut_cliente, nombre_cliente, apellido_paterno,
            apellido_materno, direccion_cliente, telefono_cliente) 
            VALUES (?, ?, ?, ?, ?, ?)");
            $cnn->bind_param("ssssss", $rut_cliente, $nombre_cliente, $apellido_paterno, $apellido_materno, $direccion_cliente, $telefono_cliente);
            $cnn->execute();
            if($cnn->affected_rows > 0){
                echo "se a ingresado la informacion correctemente";
            } else {
                echo "a ocurrido un error al ingresar en la base de datos";
            }
            $cnn->close();
            $conexion->close();
        }
    }
?>
