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
    <a href="admin_inicio.php">Inicio</a>
    <a href="admin_equipos.php" class="activo">Administrar equipos</a>
    <a href="admin_tecnico.php">Administrar Personal</a>
    <a href="solicitudes.php">Solicitudes</a>
    <a href="index.php">Cerrar Sesion</a>
</nav>

<div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Acciones</th>
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
                echo "<td>" . $row['modelo'] . "</td>";
                echo "<td class='opciones'>";
                echo "<a href='editar_equipos.php?id=" . $row['id_equipo'] . "' title='Editar'>✏️</a> ";
                echo "<a href='ver_eqipos.php?id=" . $row['id_equipo'] . "' title='Borrar' onclick=\"return confirm('¿Estás seguro de que quieres borrar este equipo?')\">🗑️</a>";
                echo "</td>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>