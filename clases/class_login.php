<?php
	class login{
		//FUNCIÓN PARA CREAR PRODUCTO
		function iniciar_sesion($correo,$pass){
			require_once "../db_config.php";
			$stmt=$db_con->prepare("SELECT * FROM usuario WHERE correo = '$correo' AND pass = '$pass'");  
              if($stmt->execute()){ 
                if($fila=$stmt->fetch(PDO::FETCH_ASSOC)){ 
                if ((isset($fila['hash']) && password_verify($pass,$fila['hash'])) || $fila['pass'] == $pass){
                $id           = $fila['id'];
                $id_sucursal  = $fila['id_sucursal'];
                $nombre       = $fila['nombre'];
                $correo       = $fila['correo'];
                $tipo_usuario = $fila['tipo_usuario'];
                session_start(); 
                $_SESSION['id']            = $id;         
                $_SESSION['id_sucursal']   = $id_sucursal;         
                $_SESSION['nombre']        = $nombre;         
                $_SESSION['correo']        = $correo;   
                $_SESSION['tipo_usuario']  = $tipo_usuario;   
                echo "exito";      
                }
                else {
                echo "Usuario o Password Incorrectos";
                }
              } 
              else{
                echo "Usuario o Password Incorrectos";
                }
              }
              else{
              echo "Ocurrió un problema";
              }
		} 
		//TERMINA FUNCIÓN CREAR PRODUCTO

		

//FIN DE CLASE
	}
?>