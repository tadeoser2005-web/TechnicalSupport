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
      <th>Nombre</th>
      <th>Correo</th>
      <th>Descripcion</th>
      <th>Detalle</th>

    </tr>
    </thead>
    <tbody>
    <!-- Filas de datos de equipos -->
    <tr>
      <td>Tadeo</td>
      <td>tadeo@gmail.com</td>
      <td>Mi compu no sirve</td>
        <td class='opciones'>
            <a href='detalle_solicitud.php' title='Detalle'>🔍</a>

    </tr>
    <tr>
      <td>Glenda</td>
      <td>glen@gmail.com</td>
      <td>Mi compu no sirve</td>
      <td class='opciones'>
        <a href='detalle_solicitud.php' title='Detalle'>🔍</a>
    </tr>
    </tbody>
  </table>
</div>
</body>
</html>