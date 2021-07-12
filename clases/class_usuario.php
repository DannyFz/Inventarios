<?php
	class usuario{
		//FUNCIÓN CREAR USUARIO
		function crear_usuario($sucursal,$nombre,$ape_p,$ape_m,$tipo,$correo,$pass){
			require_once "../db_config.php";
			$stmt0=$db_con->prepare("SELECT * FROM usuario WHERE correo='$correo' AND id_sucursal='$sucursal'");
              $stmt0->execute();
              if($stmt0->rowCount() > 0){
              echo "exist";
              }
              else{
              	$hash = password_hash($pass,PASSWORD_DEFAULT);
				$stmt=$db_con->prepare("INSERT INTO usuario(id_sucursal,nombre,ape_p,ape_m,correo,pass,hash,tipo_usuario)VALUES('$sucursal','$nombre','$ape_p','$ape_m','$correo','$pass','$hash','$tipo')");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				} 
			}
		}
	//TERMINA CREAR USUARIO

//FIN DE CLASE
	}
?>