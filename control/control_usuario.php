<?php

require '../clases/class_usuario.php';

$usuario = new usuario();

$metodo = $_POST['metodo'];

switch ($metodo) {
	case 'crear_usuario':
      	$sucursal  = $_POST['sucursal'];
      	$nombre    = $_POST['nombre'];
      	$ape_p     = $_POST['ape_p'];
      	$ape_m     = $_POST['ape_m'];
        $tipo      = $_POST['tipo'];
      	$correo    = $_POST['correo'];
      	$pass      = $_POST['pass'];
      	
		$usuario->crear_usuario($sucursal,$nombre,$ape_p,$ape_m,$tipo,$correo,$pass);

		break;
}

?>