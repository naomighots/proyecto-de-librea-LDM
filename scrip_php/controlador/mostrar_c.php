<?php
    $conn = db::connect();
    
    $sql = "SELECT rut, Nombre, Apellido_paterno, Apellido_materno, Telefono, Direccion FROM Persona";
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
