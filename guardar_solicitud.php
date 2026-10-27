<?php
require_once("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$equipo_texto = $_POST['equipo'];
$descripcion = $_POST['descripcion'];
$comentario = $_POST['comentario'];


$sqlBuscar = "SELECT id_usuario FROM usuario WHERE correo = '$correo'";
$resultado = $conexion->query($sqlBuscar);

if ($resultado->num_rows > 0) {

    $fila = $resultado->fetch_assoc();
    $id_usuario = $fila['id_usuario'];
} else {

    $sqlUsuario = "INSERT INTO usuario(nombre, correo) VALUES('$nombre', '$correo')";
    if (!$conexion->query($sqlUsuario)) {
        echo "<script>alert('No se pudo registrar el usuario'); window.location.href='usuario_inicio.php';</script>";
        exit();
    }
    $id_usuario = $conexion->insert_id;
}


$sqlBuscarEquipo = "SELECT id_equipo FROM equipo WHERE marca = '$equipo_texto'";
$resultadoEquipo = $conexion->query($sqlBuscarEquipo);

if ($resultadoEquipo->num_rows > 0) {

    $filaEquipo = $resultadoEquipo->fetch_assoc();
    $id_equipo = $filaEquipo['id_equipo'];
} else {

    $sqlCrearEquipo = "INSERT INTO equipo(marca, modelo) VALUES('$equipo_texto', '')";
    $conexion->query($sqlCrearEquipo);
    $id_equipo = $conexion->insert_id;
}


$sqlSolicitud = "INSERT INTO solicitud(id_usuario, id_equipo, descripcion, observacion, estado) 
                 VALUES('$id_usuario', '$id_equipo', '$descripcion', '$comentario', 'Pendiente')";

if ($conexion->query($sqlSolicitud)) {
    echo "<script>
            alert('Solicitud enviada correctamente');
            window.location.href='usuario_inicio.php';
          </script>";
} else {
    echo "<script>
            alert('No se pudo registrar la solicitud: " . $conexion->error . "');
            window.location.href='usuario_inicio.php';
          </script>";
}

$conexion->close();
?>