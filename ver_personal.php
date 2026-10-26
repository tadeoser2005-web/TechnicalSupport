<?php
include "conexion.php";
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
    <a href="admin_inicio.php">Inicio</a>
    <a href="admin_equipos.php" >Administrar equipos</a>
    <a href="admin_tecnico.php" class="activo">Administrar Personal</a>
    <a href="solicitudes.php">Solicitudes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>

<div>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <!-- Filas de datos de equipos -->
        <?php
        $resultado = mysqli_query($conexion, "SELECT * FROM tecnico");
        if ($resultado && mysqli_num_rows($resultado) > 0 ) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $row['id_tecnico'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido'] . "</td>";
                echo "<td>" . $row['correo'] . "</td>";
                echo "<td class='opciones'>";
                echo "<a href='editar_personal.php?id=" . $row['id_tecnico'] . "' title='Editar'>✏️</a> ";
                echo "<a href='eliminar_tecnico.php?id=" . $row['id_tecnico'] . "' title='Borrar' onclick=\"return confirm('¿Estás seguro de que quieres borrar este tecnico?')\">🗑️</a>";
               //en esta ultima linea se manda el id a la url

                echo "</td>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>