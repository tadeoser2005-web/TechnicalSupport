<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "sistemaReportes";

$conexion = new mysqli($servidor,$usuario,$password,$baseDatos);
if($conexion-> connect_error){
    die("Error de conexion".$conexion->connect_error);  /*el die es un tipo return o un break n ciclos*/
}