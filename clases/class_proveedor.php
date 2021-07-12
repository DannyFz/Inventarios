<?php
	class proveedor{

		//FUNCIÓN GUARDAR PROVEEDOR
		function crear_proveedor($sucursal,$nombre,$razon_social,$estado,$ciudad,$colonia,$calle,$cp,$num_ext,
			$num_int,$tel,$url,$correo){
			require_once "../db_config.php";
            $stmt0=$db_con->prepare("SELECT * FROM proveedor WHERE nombre='$nombre'");
              $stmt0->execute();
              if($stmt0->rowCount() > 0){
              echo "Ya existe un proveedor con el mismo nombre";
              }
              else{
				$stmt=$db_con->prepare("INSERT INTO proveedor (id_sucursal,nombre,razon_social,estado,ciudad,colonia,
					calle,cp,num_ext,num_int,tel,correo,url)VALUES('$sucursal','$nombre','$razon_social','$estado','$ciudad','$colonia','$calle','$cp','$num_ext','$num_int','$tel','$correo','$url')");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				} 
			}
		}
		//TERMINA FUNCIÓN GUARDAR PROVEEDOR

		//FUNCIÓN OBTENER PROVEEDOR
		function obtener_proveedor($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM proveedor WHERE id_sucursal = '$id'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Aún no hay proveedores para esta sucursal";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo "<tr id=".$row["id"].">
                	<td style='text-align:center;'>".$row["nombre"]."</td>
                	<td style='text-align:center;'>".$row["tel"]."</td>
                	<td style='text-align:center;'>".$row["correo"]."</td>
                	<td><a href='".$row["url"]."' target='_blank'>".$row["url"]."</a></td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='ver_proveedor modal-trigger'><i class='material-icons black-text'>visibility</i></a></td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='eliminar_proveedor modal-trigger'><i class='material-icons red-text'>delete</i></a></td>
					</tr>";
					}
			}
		}
		//TERMINA FUNCIÓN OBTENER PROVEEDOR


		//FUNCION VER PROVEEDOR
		function ver_proveedor($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM proveedor where id = '$id'");
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
      					<label>Razon social</label>
      					<input type='text' value=".$row["razon_social"]." readonly>
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
      					<label>Codigo postal</label>
      					<input type='text' value=".$row["cp"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Numero exterior</label>
      					<input type='text' value=".$row["num_ext"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Numero interior</label>
      					<input type='text' value=".$row["num_int"]." readonly>
    				</div>
					<div class='col l6 m12 s12'>
      					<label>Telefono</label>
      					<input type='text' value=".$row["tel"]." readonly>
    				</div>
					<div class='col l6 m12 s12'>
      					<label>Correo</label>
      					<input type='text' value=".$row["correo"]." readonly>
    				</div>
					<div class='col l6 m12 s12'>
      					<label>URL</label>
      					<input type='text' value=".$row["url"]." readonly>
    				</div>
					<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='modal_editar_proveedor modal-trigger'><i class='btn' style='color:black;'>Editar</i></a></td>
					";		
					}	
			}
		}
		//TERMINA FUNCION VER PROVEEDOR

		//FUNCIÓN EDITAR PROVEEDOR
		function modal_editar_proveedor($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM proveedor WHERE id = '$id'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo '
    				<div class="col l12 m12 s12">
      					<label>Nombre</label>
      					<input id="e_nombre" type="text" value="'.$row["nombre"].'">
    				</div>
    				<div class="col l6 m12 s12">
      					<label>Razon Social</label>
      					<input id="e_razon_social" type="text" value="'.$row["razon_social"].'">
    				</div>
    				<div class="col l6 m12 s12">
      					<label>Estado</label>
      					<input id="e_estado" type="text" value="'.$row["estado"].'">
    				</div>
    				<div class="col l6 m12 s12">
      					<label>Ciudad</label>
      					<input id="e_ciudad" type="text" value="'.$row["ciudad"].'">
    				</div>
					<div class="col l12 m12 s12">
      					<label>Colonia</label>
      					<input id="e_colonia" type="text" value="'.$row["colonia"].'">
    				</div> 
					<div class="col l12 m12 s12">
      					<label>Calle</label>
      					<input id="e_calle" type="text" value="'.$row["calle"].'">
    				</div> 
					<div class="col l12 m12 s12">
      					<label>Codigo Postal</label>
      					<input id="e_cp" type="text" value="'.$row["cp"].'">
    				</div> 
					<div class="col l12 m12 s12">
      					<label>Numero Exterior</label>
      					<input id="e_num_ext" type="text" value="'.$row["num_ext"].'">
    				</div> 
					<div class="col l12 m12 s12">
      					<label>Numero Interior</label>
      					<input id="e_num_int" type="text" value="'.$row["num_int"].'">
    				</div> 
					<div class="col l12 m12 s12">
      					<label>Telefono</label>
      					<input id="e_tel" type="text" value="'.$row["tel"].'">
    				</div> 
					<div class="col l12 m12 s12">
      					<label>Correo</label>
      					<input id="e_correo" type="text" value="'.$row["correo"].'">
    				</div> 
					<div class="col l12 m12 s12">
      					<label>Url</label>
      					<input id="e_url" type="text" value="'.$row["url"].'">
    				</div> 
				
    				<div class="col l12 m12 s12">
      					<a href="#" id="'.$row["id"].'" class="editar_proveedor btn #1b5e20 green darken-4 white-text">Editar<i class="material-icons left">edit</i></a>
    				</div>
					';		
					}	
			}
		} 
		//TERMINA FUNCIÓN EDITAR PROVEEDOR

		//FUNCIÓN EDITAR PROVEEDOR
		function editar_proveedor($id,$nombre,$razon_social,$estado,$ciudad,$colonia,$calle,$cp,$num_ext,$num_int,$tel,$correo,$url){
			require_once "../db_config.php";
				  $stmt=$db_con->prepare("UPDATE proveedor SET nombre = '$nombre', razon_social = '$razon_social',
					estado = '$estado', ciudad = '$ciudad', colonia = '$colonia', calle = '$calle', cp = '$cp', 
					num_ext = '$num_ext', num_int = '$num_int', tel = '$tel', correo = '$correo', url = '$url' WHERE id = '$id'");
					if($stmt->execute()){
					echo "exito";
					}
					else{
					echo "error";
				  }
		  }
		  //TERMINA FUNCIÓN EDITAR PROVEEDOR

		  //FUNCION ELIMINAR PROVEEDOR
		  function eliminar_proveedor($id){
			require_once "../db_config.php";
			$stmt=$db_con->prepare("DELETE FROM proveedor WHERE id = '$id'");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				}
			
		}
		//TERMINA FUNCION ELIMINAR PROVEEDOR

	}
?>