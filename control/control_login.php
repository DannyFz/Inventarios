<?php

require '../clases/class_login.php';

$login = new login();

$metodo = $_POST['metodo'];

switch ($metodo) {
	case 'login':
		$correo = $_POST['correo'];
      	$pass   = $_POST['pw'];
      	
		$login->iniciar_sesion($correo,$pass);

		break;


}

?>