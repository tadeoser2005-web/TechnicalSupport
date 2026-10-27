<?php
include 'conexion.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Equipo WHERE id_equipo = $id";
    if (mysqli_query($conexion, $sql)) {
        header("Location: ver_eqipos.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
} else {
    header("Location: ver_eqipos.php");
    exit();
}
?>
