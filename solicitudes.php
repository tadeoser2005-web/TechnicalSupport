<?php
include 'conexion.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitudes</title>
  <link rel="stylesheet" href="CSS/Styles.css">
</head>
<body>
<nav class="menu">
  <a href="admin_inicio.php">Inicio</a>
  <a href="admin_equipos.php" >Administrar equipos</a>
  <a href="admin_tecnico.php">Administrar Personal</a>
  <a href="solicitudes.php" class="activo">Solicitudes</a>
  <a href="index.php">Cerrar Sesion</a>
</nav>

<div>
  <table>
    <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Equipo</th>
        <th>Descripcion</th>
        <th>Comentarios</th>
        <th>Estado</th>

    </tr>
    </thead>
    <tbody>
    <!-- Filas de datos de equipos -->
    <?php
    $resultado = mysqli_query($conexion, "SELECT * FROM solicitud");
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['id_equipo'] . "</td>";
        echo "<td>" . $row['marca'] . "</td>";
        echo "<td>" . $row['modelo'] . "</td>";
        echo "</td>";
    }
    ?>
    ?>
    </tbody>
  </table>
</div>
</body>
</html>