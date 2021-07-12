<?php
	class sucursal{

		//FUNCIÓN GUARDAR SUCURSAL MATRIZ
		function registrar_sucursal_matriz($ad_nombre,$ad_ape_p,$ad_ape_m,$correo,$pass,$nombre,$estado,$ciudad,$colonia,$calle,$cp,$num_ext,$num_int){
			require_once "../db_config.php";
            $stmt0=$db_con->prepare("SELECT * FROM sucursal WHERE nombre='$nombre'");
              $stmt0->execute();
              if($stmt0->rowCount() > 0){
              echo "Ya existe una sucursal con ese nombre";
              }
              else{
				$stmt=$db_con->prepare("INSERT INTO sucursal (nombre,estado,ciudad,colonia,calle,cp,num_ext,
				num_int,matriz,estatus)VALUES('$nombre','$estado','$ciudad','$colonia','$calle','$cp','$num_ext','$num_int','0','ACTIVA')");
				if($stmt->execute()){
					$stmt2=$db_con->prepare("SELECT * FROM sucursal WHERE nombre='$nombre'");
              		$stmt2->execute(); 
              		$row=$stmt2->fetch(PDO::FETCH_ASSOC); 
					$id=$row['id'];
					$hash = password_hash($pass,PASSWORD_DEFAULT);
					$stmt3=$db_con->prepare("INSERT INTO usuario(id_sucursal,nombre,ape_p,ape_m,correo,pass,hash,tipo_usuario)VALUES('$id','$ad_nombre','$ad_ape_p','$ad_ape_m','$correo','$pass','$hash','1')");
					if($stmt3->execute()){
						echo "exito";
					}							
					else{
						echo "error, no se creo el usuario";
					} 	
				}							
				else{
					echo "error";
				} 
			}
		} 
		//TERMINA FUNCIÓN GUARDAR SUCURSAL MATRIZ

		//FUNCIÓN OBTENER SUCURSALES
		function obtener_sucursales($matriz){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM sucursal WHERE id = '$matriz' OR matriz = '$matriz'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo "<tr>
                	<td style='text-align:center;'>".$row["nombre"]."</td>
                	<td style='text-align:center;'>".$row["estado"]."</td>
                	<td style='text-align:center;'>".$row["ciudad"]."</td>
                	<td style='text-align:center;'>".$row["estatus"]."</td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='ver_sucursal modal-trigger'><i class='material-icons black-text'>visibility</i></a></td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='modal_editar_sucursal modal-trigger'><i class='material-icons' style='color:black;'>edit</i></a></td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='ver_usuarios modal-trigger'><i class='material-icons black-text'>person_add</i></a></td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='cerrar_sucursal modal-trigger'><i class='material-icons red-text'>wrong_location</i></a></td>
              		</tr>";		
					}
			}
		}
		//TERMINA FUNCIÓN OBTENER SUCURSALES

		//FUNCIÓN VER SUCURSAL
		function ver_sucursal($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM sucursal WHERE id = '$id'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo "
    				<div class='col l12 m12 s12'>
      					<label>Nombre</label>
      					<input type='text' value=".$row["nombre"]." readonly>
    				</div> 
    				<div class='col l6 m12 s12'>
      					<label>Estado</label>
      					<input type='text' value=".$row["estado"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Ciudad</label>
      					<input type='text' value=".$row["ciudad"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Colonia</label>
      					<input type='text' value=".$row["colonia"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Calle</label>
      					<input type='text' value=".$row["calle"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Código Postal</label>
      					<input type='text' value=".$row["cp"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Número Exterior</label>
      					<input type='text' value=".$row["num_ext"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Número Interior</label>
      					<input type='text' value=".$row["num_int"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Estatus</label>
      					<input type='text' value=".$row["estatus"]." readonly>
    				</div>
					";		
					}	
			}
		} 
		//TERMINA FUNCIÓN VER SUCURSAL

		//FUNCIÓN EDITAR SUCURSAL
		function modal_editar_sucursal($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM sucursal WHERE id = '$id'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo "
    				<div class='col l12 m12 s12'>
      					<label>Nombre</label>
      					<input id='ed_nombre' type='text' value=".$row["nombre"].">
    				</div> 
    				<div class='col l6 m12 s12'>
      					<label>Colonia</label>
      					<input id='ed_colonia' type='text' value=".$row["colonia"].">
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Calle</label>
      					<input id='ed_calle' type='text' value=".$row["calle"].">
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Código Postal</label>
      					<input id='ed_cp' type='text' value=".$row["cp"].">
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Número Exterior</label>
      					<input id='ed_ne' type='text' value=".$row["num_ext"].">
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Número Interior</label>
      					<input id='ed_ni' type='text' value=".$row["num_int"].">
    				</div>

    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>

    				<div class='col l6 m12 s12'>
      					<a href='#' id=".$row["id"]." class='editar_sucursal btn #1b5e20 green darken-4 white-text'>Editar<i class='material-icons left'>edit</i></a>
    				</div>
					";		
					}	
			}
		} 
		//TERMINA FUNCIÓN MODAL EDITAR SUCURSAL

    //FUNCIÓN EDITAR SUCURSAL
    function editar_sucursal($id,$nombre,$colonia,$calle,$cp,$num_ext,$num_int){
      require_once "../db_config.php";
            $stmt=$db_con->prepare("UPDATE sucursal SET nombre = '$nombre', colonia = '$colonia',
              calle = '$calle', cp = '$cp', num_ext = '$num_ext', num_int = '$num_int'
              WHERE id = '$id'");
              if($stmt->execute()){
              echo "exito";
              }
              else{
              echo "error";  
            }
    } 
    //TERMINA FUNCIÓN EDITAR SUCURSAL


    //FUNCIÓN CERRAR SUCURSAL
    function cerrar_sucursal($id){
      require_once "../db_config.php";
          $stmt0=$db_con->prepare("SELECT * FROM sucursal WHERE id='$id'");
            $stmt0->execute(); 
              $row=$stmt0->fetch(PDO::FETCH_ASSOC); 
              $e=$row['estatus'];
              if ($e=='ACTIVA') {
                $stmt=$db_con->prepare("UPDATE sucursal SET estatus = 'CERRADA' WHERE id = '$id'");
                if($stmt->execute()){
                  echo "cerrar";
                }
                else{
                  echo "error";  
                }
              }else{
                $stmt=$db_con->prepare("UPDATE sucursal SET estatus = 'ACTIVA' WHERE id = '$id'");
                if($stmt->execute()){
                  echo "abrir";
                }
                else{
                  echo "error";  
                }
              }  
    } 
    //TERMINA FUNCIÓN CERRAR SUCURSAL


		//FUNCIÓN GUARDAR SUCURSAL
		function nueva_sucursal($matriz,$nombre,$estado,$ciudad,$colonia,$calle,$cp,$num_ext,$num_int){
			require_once "../db_config.php";
              	$stmt=$db_con->prepare("INSERT INTO sucursal(nombre,estado,ciudad,colonia,calle,cp,
					num_ext,num_int,matriz,estatus)VALUES('$nombre','$estado','$ciudad','$colonia','$calle','$cp','$num_ext','$num_int','$matriz','ACTIVA')");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				} 		
		} 
		//TERMINA FUNCIÓN GUARDAR SUCURSAL 


		//FUNCIÓN OBTENER USUARIOS
		function ver_usuarios($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM usuario WHERE id_sucursal = '$id' AND tipo_usuario > 1");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					if ($row["tipo_usuario"]==2) {
							$tipo='Gerente';
						}else{
							$tipo='Venta';
						}	
					echo "<tr>
                	<td style='text-align:center;'>".$row["nombre"]."</td>
                	<td style='text-align:center;'>".$row["ape_p"]."</td>
                	<td style='text-align:center;'>".$row["ape_m"]."</td>
                	<td style='text-align:center;'>".$row["correo"]."</td>
                	<td style='text-align:center;'>".$tipo."</td>
                	
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='modal_editar_usuario modal-trigger'><i class='material-icons'>edit</i></a></td>
              		</tr>";		
					}	
			}
		} 
		//TERMINA FUNCIÓN OBTENER USUARIOS 

		//FUNCIÓN EDITAR USUARIO
		function modal_editar_usuario($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM usuario WHERE id = '$id'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo "
    				<div class='col l12 m12 s12'>
      					<label>Nombre</label>
      					<input id='ed_nombre_u' type='text' value=".$row["nombre"].">
    				</div> 
    				<div class='col l6 m12 s12'>
      					<label>Apellido Paterno</label>
      					<input id='ed_ape_p' type='text' value=".$row["ape_p"].">
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Apellido Materno</label>
      					<input id='ed_ape_m' type='text' value=".$row["ape_m"].">
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Correo</label>
      					<input id='ed_correo' type='text' value=".$row["correo"].">
    				</div>
    				
    				
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>
    				<div class='col l6 m12 s12'>
    				</div>

    				<div class='col l6 m12 s12'>
      					<a href='#' id='".$row["id"]."' class='editar_usuario btn #1b5e20 green darken-4 white-text'>Editar<i class='material-icons left'>edit</i></a>
    				</div>
					";		
					}	
			}
		} 
		//TERMINA FUNCIÓN EDITAR USUARIO


    //FUNCIÓN EDITAR USUARIO
    function editar_usuario($id,$nombre,$ape_p,$ape_m,$correo){
      require_once "../db_config.php";
            $stmt=$db_con->prepare("UPDATE usuario SET nombre = '$nombre', ape_p = '$ape_p',
              ape_m = '$ape_m', correo = '$correo' WHERE id = '$id'");
              if($stmt->execute()){
              echo "exito";
              }
              else{
              echo "error";  
            }
    } 
    //TERMINA FUNCIÓN EDITAR USUARIO


		//FUNCIÓN CREAR ESPACIO
		function crear_espacio($id_sucursal,$descripcion){
			require_once "../db_config.php";
				$stmt=$db_con->prepare("INSERT INTO espacio_almacen(id_sucursal,descripcion)VALUES($id_sucursal,'$descripcion')");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				} 			
		} 
		//TERMINA FUNCIÓN CREAR ESPACIO


		//FUNCIÓN CREAR DEPTO.
		function crear_depto($id_sucursal,$nombre){
			require_once "../db_config.php";
				$stmt=$db_con->prepare("INSERT INTO depto(id_sucursal,nombre)VALUES($id_sucursal,'$nombre')");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				} 			
		} 
		//TERMINA FUNCIÓN CREAR DEPTO. 


		//FUNCIÓN CREAR DEPTO.
		function subir_producto($depto,$codigo,$cantidad){
			require_once "../db_config.php";
				$stmt=$db_con->prepare("INSERT INTO tienda(id_depto,codigo,cantidad)VALUES($depto,'$codigo','$cantidad')");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				} 			
		} 
		//TERMINA FUNCIÓN CREAR DEPTO. 

		//FUNCIÓN OBTENER SUCURSALES SOLICITUD
		function obtener_sucursales_solicitud($sucursal){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM sucursal WHERE matriz = '$matriz' AND id != '$sucursal'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo "<option value=".$row["id"]." >".$row["nombre"]."</option>";		
					}	
			}
		} 
		//TERMINA FUNCIÓN OBTENER SUCURSALES SOLICITUD


//
	}
?>