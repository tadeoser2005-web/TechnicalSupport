<?php
include 'conexion.php';

//isset es una medida de seguridad para ver q exista la variable
if (isset($_GET['id'])) { //este id hace referencia a lo q pusimos en el icono y lo mandamos traer con el GET
    $id = $_GET['id']; //Y lo q trajo lo guardamos en la variable id
    $query = "SELECT *FROM Equipo WHERE id_equipo = $id";
    //hacemos el select con el id q trajimos del icono y buscamos en el campo id_equipo de la bd el q coincida

    //guardamos lo q trajo de la consulta en resultado
    $resultado = mysqli_query($conexion, $query);
    $equipo = mysqli_fetch_assoc($resultado);
    //lo convierte en un arreglo asosiativo
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_equipo = $_POST['id_equipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];



    $sql_update = "UPDATE equipo SET marca = '$marca',modelo = '$modelo'WHERE id_equipo = $id_equipo";

    if (mysqli_query($conexion, $sql_update)) {

        header("Location: ver_eqipos.php");
        exit();
    } else {
        $error = "Error al actualizar: " . mysqli_error($conexion);
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
    <a href="admin_tecnico.php">Administrar Personal</a>
    <a href="solicitudes.php">Solicitudes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>

<main class="dos-columnas">

    <form class="formulario" action="" method="post">
        <h1>Administrar Equipos</h1>
        <!--lo de dentor de equipo son campos de la bd-->
        <input type="hidden" name="id_equipo" value="<?php echo $equipo['id_equipo'];?>">
        <input type="text" name="marca" value="<?php echo htmlspecialchars($equipo['marca'])?>" aria-label="Marca" required>
        <input type="text" name="modelo" value="<?php echo htmlspecialchars($equipo['modelo'])?>" aria-label="Modelo" required>
        <button class="botones" type="submit">Actualizar Equipos</button>
    </form>

    <div class="imagen2">  <img src="Assets/cardenalDer.png" alt="Imagen 2" width="500" height="580"></div>
</main>


</body>
</html>