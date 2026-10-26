<?php

require_once("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$equipo = $_POST['equipo'];

$descripcion = $_POST['descripcion'];
$comentario = $_POST['comentario'];

// Verificar si el usuario ya existe
$sqlBuscar = "SELECT id_usuario
              FROM usuario
              WHERE correo = '$correo'";

$resultado = $conexion->query($sqlBuscar);

if ($resultado->num_rows > 0) {

    // Usuario existente
    $fila = $resultado->fetch_assoc();
    $id_usuario = $fila['id_usuario'];

} else {

    // Crear usuario nuevo
    $sqlUsuario = "INSERT INTO usuario(nombre, correo, equipo)
                   VALUES('$nombre', '$correo', '$equipo')";

    if (!$conexion->query($sqlUsuario)) {

        echo "<script>
                alert('No se pudo registrar el usuario');
                window.location.href='usuario_inicio.php';
              </script>";
        exit();
    }

    $id_usuario = $conexion->insert_id;
}


// Insertar solicitud
$sqlSolicitud = "INSERT INTO solicitud(
                    id_usuario,
                    descripcion,
                    observacion
                )
                VALUES(
                    '$id_usuario',
                    '$descripcion',
                    '$comentario'
                )";

if ($conexion->query($sqlSolicitud)) {

    echo "<script>
            alert('Solicitud enviada correctamente');
            window.location.href='usuario_inicio.php';
          </script>";

} else {

    echo "<script>
            alert('No se pudo registrar la solicitud');
            window.location.href='usuario_inicio.php';
          </script>";
}

$conexion->close();

?>