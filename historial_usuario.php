<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de solicitudes</title>
      <link rel="stylesheet" href="CSS/Styles.css">
</head>
<body>


<nav class="menu">
    <a href="usuario_inicio.php">Inicio</a>
    <a href="solicitud_usuario.php">Realizar solicitud</a>
    <a href="ver_equipos_usuario.php">Ver equipos disponibles</a>
    <a href="historial_usuario.php" class="activo"  >Historial de reportes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>
<div>
  <table>
    <thead>
    <tr>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Descripcion</th>
      <th>Estado</th>

    </tr>
    </thead>
    <tbody>
    <!-- Filas de datos de equipos -->
    <tr>
      <td>Tadeo</td>
      <td>tadeo@gmail.com</td>
      <td>Mi compu no sirve</td>
        <td>En espera</td>

    </tr>

    </tbody>
  </table>
</div>

    
</body>
</html>