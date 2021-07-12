<?php 
session_start(); 
$id           = $_SESSION['id'];   
$id_sucursal  = $_SESSION['id_sucursal'];   
$nombre       = $_SESSION['nombre'];         
$correo       = $_SESSION['correo'];
$tipo_usuario = $_SESSION['tipo_usuario'];       
if($id == null){ 
header("Location: login.php");   
}
?>