<?php
include 'conexion.php';
//Aqui verificamos que el form se haya enviado por el metodo post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $sql = "INSERT INTO Equipo (marca, modelo) VALUES ('$marca','$modelo')";
    if (mysqli_query($conexion, $sql)) {
        echo "Equipo registrado correctamente";
    } else {
        echo "Error en el registro del equipo";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrar Equipos</title>
  <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
<nav class="menu">
  <a href="admin_inicio.php">Inicio</a>
  <a href="admin_equipos.php" class="activo">Administrar equipos</a>
  <a href="admin_tecnico.php" >Administrar Personal</a>
  <a href="solicitudes.php">Solicitudes</a>
  <a href="index.php">Cerrar Sesion</a>
</nav>

<main class="dos-columnas">

  <form class="formulario" action="admin_equipos.php" method="post">
    <h1>Administrar Equipos</h1>
    <input type="text" name="marca" placeholder="Marca" aria-label="Marca" required>
    <input type="text" name="modelo" placeholder="Modelo" aria-label="Modelo" required>
    <button type="submit">Registrar equipo</button>
    <button type="button" onclick="window.location.href='ver_eqipos.php'">Ver equipos</button>
  </form>

  <div class="imagen2">  <img src="Assets/cardenalDer.jpg" alt="Imagen 2" width="500" height="580"></div>
</main>


</body>
</html>