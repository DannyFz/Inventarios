<?php
	class producto{
		//FUNCIÓN PARA CREAR PRODUCTO
		function crear_producto($proveedor,$sucursal,$codigo,$nombre,$unidad,$costo,$precio,$cantidad,$maximo,$minimo){
			require_once "../db_config.php";
			$stmt=$db_con->prepare("INSERT INTO producto(id_proveedor,id_sucursal,codigo,nombre,unidad,
				costo,precio,cantidad,cant_max,cant_min)VALUES('$proveedor','$sucursal','$codigo','$nombre','$unidad','$costo','$precio','$cantidad','$maximo','$minimo')");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				}
		} 
		//TERMINA FUNCIÓN CREAR PRODUCTO 

		//LISTA DE PROVEEDORES
			function lista_proveedores($sucursal){
			require_once "../db_config.php";
			$response = "";
            $stmt=$db_con->prepare("SELECT * FROM proveedor WHERE id_sucursal = '$sucursal' ORDER BY id ASC");
        if($stmt->execute())
        {
        $response .= '<option value="seleccione">Selecciona Un Proveedor</option>';
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))        
        $response .= '<option value="'.$row["id"].'" >'.$row["nombre"].'</option>';
        echo utf8_encode($response);
        }
        else{
        echo "Ocurrio un problema";
        	}	
		}
		//LISTA DE PROVEEDORES

		//FUNCIÓN PARA OBTENER PRODUCTO PARA VENTA
		function obtener_productos_sucursal($matriz){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM producto WHERE id_sucursal = '$matriz'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
						$m=$row["cant_min"];
						$c=$row["cantidad"];
						if($c>$m){
							$a="green-text";
						}
						elseif($c=$m){
							$a="yellow-text";
						}
						elseif($c<=$m){
							$a="red-text";
						}
					echo "<tr>
                	<td style='text-align:center;'>".$row["codigo"]."</td>
                	<td style='text-align:center;'>".$row["nombre"]."</td>
                	<td class='".$a."' style='text-align:center;'>".$row["cantidad"]."</td>
					<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='ver_almacen modal-trigger'><i class='material-icons black-text'>visibility</i></a></td>
					";

							
                	/*
					<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='agregar_producto modal-trigger'><i class='material-icons'>add</i></a></td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='quitar_producto modal-trigger'><i class='material-icons'>edit</i></a></td>
                	<td style='text-align:center;'><a href='#!' id='".$row["id"]."' class='editar_producto modal-trigger'><i class='material-icons'>edit</i></a></td>	
                	*/
                	
					}	
			}	
		} 
		//TERMINA FUNCIÓN OBTENER PRODUCTO PARA VENTA


		//FUNCIÓN PARA OBTENER PRODUCTO PARA VENTA
		function obtener_producto($folio,$codigo,$cantidad){
			require_once "../db_config.php"; 
			if($cantidad!=''){}else{$cantidad=1;}
			$stmt=$db_con->prepare("SELECT * FROM producto WHERE codigo = '$codigo'");
				$stmt->execute();
				if($stmt->rowCount() > 0){
					$stmt2=$db_con->prepare("INSERT INTO lista_producto(folio,codigo,cantidad,estatus)VALUES('$folio','$codigo','$cantidad','PENDIENTE')");
					$stmt2->execute();
					$fila=$stmt->fetch(PDO::FETCH_ASSOC);
					$a=$fila["precio"];
					$b=$a*$cantidad;
					$stmt3=$db_con->prepare("SELECT MAX(id) as id,codigo FROM lista_producto WHERE folio='$folio'");
					$stmt3->execute();
					$fila2=$stmt3->fetch(PDO::FETCH_ASSOC);
					$lid=$fila2["id"];
					$coprod=$fila2["codigo"];
					

					echo "<tr id=".$lid.">
                	<td>".$fila["nombre"]."</td>
                	<td><input type='number' id='cnt_".$lid."' codigo=".$coprod." value=".$cantidad." class='n_cant' onkeydown='return false'></td>
                	<td><input type='text' id='P".$lid."' codigo=".$coprod." value=".$a." class='' onkeydown='return false'></td>
					<td id='total".$lid."' class='c_total'>".$b."</td>
                	<td><a href='#' class='cancelar_prod' precio=".$b." id=".$lid.">X</a></td>
					<td><a href='#' id=".$lid." class='total_product btn'>Actualizar</a></td>
					<a>a<a/>
              		</tr>";
					  
					 
				}		
				else{
					echo "clear";
				}
		}
		//TERMINA FUNCIÓN OBTENER PRODUCTO PARA VENTA


		//FUNCIÓN PARA OBTENER PRODUCTO PARA VENTA
		function actualizar_producto($id,$cantidad,$codigo){
			require_once "../db_config.php";
				$stmt2=$db_con->prepare("UPDATE lista_producto SET cantidad = '$cantidad' WHERE id = '$id'");
					$stmt2->execute();
					
					$stmt3=$db_con->prepare("SELECT * FROM producto WHERE codigo = '$codigo'");
					$stmt3->execute();
					$fila2=$stmt3->fetch(PDO::FETCH_ASSOC);
					//$fila=$stmt->fetch(PDO::FETCH_ASSOC);
					$a = $fila2["precio"];
					$b = $a*$cantidad;

					$stmt4=$db_con->prepare("SELECT * FROM lista_producto WHERE id='$id'");
					$stmt4->execute();
					$fila3=$stmt4->fetch(PDO::FETCH_ASSOC);
					
					$lid=$fila3["id"];
					
					echo "<tr id=".$id.">
                	<td>".$fila2["nombre"]."</td>
                	<td><input type='number' id=".$lid." codigo=".$codigo." value=".$cantidad." class='n_cant' onkeydown='return false'></td>
                	<td>".$fila2["precio"]."</td>
                	<td class='c_total'>".$b."</td>
                	<td><a href='#' class='cancelar_prod' precio=".$b." id=".$lid.">X</a></td>
              		</tr>";
              		
				
		}
		//TERMINA FUNCIÓN OBTENER PRODUCTO PARA VENTA


		//FUNCIÓN PARA BUSCAR PRODUCTO
		function buscar_producto($sucursal,$nombre){
			require_once "../db_config.php"; 
			$c=0;
			$stmt=$db_con->prepare("SELECT * FROM producto WHERE id_sucursal = '$sucursal' AND nombre LIKE '$nombre%'");
				$stmt->execute();
				$c=0;				
				if($stmt->rowCount() > 0){
					$fila=$stmt->fetch(PDO::FETCH_ASSOC);

					$c=$c+1;
					if ($c=1) {
					echo "<tr>
                	<td>".$fila["codigo"]."</td>
                	<td>".$fila["nombre"]."</td>
                	<td><a href='#' class='btn btn-large agregar_prod pfocus' id=".$fila["codigo"]."><i class='material-icons left'>add</i></a></td>
              		</tr>
              		<script>$('.pfocus').focus(function);</script>";		
						}else{
					echo "<tr>
                	<td>".$fila["codigo"]."</td>
                	<td>".$fila["nombre"]."</td>
                	<td><a href='#' class='btn btn-large agregar_prod' id=".$fila["codigo"]."><i class='material-icons left'>add</i></a></td>
              		</tr>";
						}
					
				}							
				else{
					echo "<tr>
                	<td>PRODUCTO NO ENCONTRADO!</td>
              		</tr>";
				}
		} 
		//TERMINA FUNCIÓN BUSCAR PRODUCTO

		//FUNCIÓN PARA AGREGAR PRODUCTO DE BÚSQUEDA
		function agregar_busqueda_producto($folio,$codigo,$cantidad){
			require_once "../db_config.php"; 
			if($cantidad!=''){}else{$cantidad=1;}
			$stmt=$db_con->prepare("SELECT * FROM producto WHERE codigo = '$codigo'");
				$stmt->execute();
				if($stmt->rowCount() > 0){
					$stmt2=$db_con->prepare("INSERT INTO lista_producto(folio,codigo,cantidad,estatus)VALUES('$folio','$codigo','$cantidad','PENDIENTE')");
					$stmt2->execute();
					$fila=$stmt->fetch(PDO::FETCH_ASSOC);
					$a=$fila["precio"];
					$b=$a*$cantidad;
					$stmt3=$db_con->prepare("SELECT MAX(id) as id FROM lista_producto WHERE folio='$folio'");
					$stmt3->execute();
					$fila2=$stmt3->fetch(PDO::FETCH_ASSOC);
					$lid=$fila2["id"];
					echo "<tr id=".$lid.">
                	<td>".$fila["nombre"]."</td>
                	<td>".$cantidad."</td>
                	<td>".$fila["precio"]."</td>
                	<td class='c_total'>".$b."</td>
                	<td><a href='#' class='cancelar_prod' precio=".$b." id=".$lid.">X</a></td>
              		</tr>";
				}							
				else{
					echo "clear";
				}
		} 
		//TERMINA PARA AGREGAR PRODUCTO DE BÚSQUEDA

		//FUNCIÓN PARA ELIMINAR PRODUCTO DE LISTA
		function eliminar_producto($id){
			require_once "../db_config.php";
			$stmt=$db_con->prepare("DELETE FROM lista_producto WHERE id = '$id'");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				}
			
		} 
		//TERMINA FUNCIÓN ELIMINAR PRODUCTO DE LISTA


		//FUNCIÓN CREAR VENTA
		function crear_venta($folio,$usuario,$sucursal){
			require_once "../db_config.php";
			date_default_timezone_set('America/Mexico_City');
            $fecha = date("Y-m-d");
            $hora  = date('H:i:s');
			$stmt0=$db_con->prepare("INSERT INTO venta(folio,fecha,hora,sucursal,usuario)VALUES('$folio','$fecha','$hora','$sucursal','$usuario')");
			$stmt0->execute();
			$stmt=$db_con->prepare("UPDATE lista_producto SET estatus='VENTA' WHERE folio = '$folio'");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				}
		} 
		//TERMINA FUNCIÓN CREAR VENTA


		//FUNCIÓN CANCELAR VENTA
		function cancelar_venta($folio){
			require_once "../db_config.php";
			$stmt=$db_con->prepare("DELETE FROM lista_producto WHERE folio = '$folio'");
				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				}
		} 
		//TERMINA FUNCIÓN CANCELAR VENTA
	
		//FUNCION VER PRODUCTO
		function ver_almacen($id){
			require_once "../db_config.php";
            $stmt=$db_con->prepare("SELECT * FROM producto where id = '$id'");
              $stmt->execute();
              if($stmt->rowCount() <= 0){
              echo "Ocurrió un error";
              }
              else{
              	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
					echo "
    				<div class='col l12 m12 s12'>
      					<label>Codigo</label>
      					<input type='text' value=".$row["codigo"]." readonly>
    				</div> 
    				<div class='col l6 m12 s12'>
      					<label>Nombre</label>
      					<input type='text' value=".$row["nombre"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Unidad</label>
      					<input type='text' value=".$row["unidad"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Costo</label>
      					<input type='text' value=".$row["costo"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Precio</label>
      					<input type='text' value=".$row["precio"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Cantidad</label>
      					<input type='text' value=".$row["cantidad"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Cantidad maxima</label>
      					<input type='text' value=".$row["cant_max"]." readonly>
    				</div>
    				<div class='col l6 m12 s12'>
      					<label>Cantidad minima</label>
      					<input type='text' value=".$row["cant_min"]." readonly>
    				</div>
					";		
					}	
			}
		}
		//TERMINA FUNCION VER PRODUCTO



//FIN DE CLASE
	}
?>