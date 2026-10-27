<?php
include 'conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Equipos Registrados</title>
    <link rel="stylesheet" href="CSS/Styles.css">
</head>
<body>

  <nav class="menu">
    <a href="usuario_inicio.php" >Inicio</a>
    <a href="solicitud_usuario.php" >Realizar solicitud</a>
    <a href="ver_equipos_usuario.php" class="activo">Ver equipos disponibles</a>
       <a href="historial_usuario.php" >Historial de reportes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>


<div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Marca</th>
              <!--  <th>Modelo</th>-->
              
            </tr>
        </thead>
        <tbody>
            <!-- Filas de datos de equipos -->
            <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM Equipo");
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $row['id_equipo'] . "</td>";
                echo "<td>" . $row['marca'] . "</td>";
               /* echo "<td>" . $row['modelo'] . "</td>";*/
                echo "</td>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>