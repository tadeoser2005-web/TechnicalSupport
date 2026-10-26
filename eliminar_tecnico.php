<?php
include 'conexion.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tecnico WHERE id_tecnico = $id";
    if (mysqli_query($conexion, $sql)) {
        header("Location: ver_personal.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
} else {
    header("Location: ver_personal.php");
    exit();
}
?>
