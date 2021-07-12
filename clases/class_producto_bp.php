<?php
	class producto{

		function guardar_nuevo_producto($codigo,$nombre,$tipo,$costo,$precio,$mayoreo,$saldo,$departamento){

			//echo $codigo.' '.$nombre.' '.$tipo.' '.$costo.' '.$precio.' '.$mayoreo.' '.$saldo.' '.$departamento;
			
			require_once "../db_config.php";

			date_default_timezone_set('America/Mexico_City');
            $d = date("Y-m-d");

			$stmt=$db_con->prepare("INSERT INTO producto (codigo,nombre,unidad,costo,menudeo,mayoreo,
				saldo_inicial,entradas,salidas,minimo,estatus,tipo,id_departamento,fecha)VALUES($codigo','$nombre','$tipo','$costo','$precio','$mayoreo','$saldo',0,0,3,'ACTIVO','$tipo','$departamento','$d')");

				if($stmt->execute()){
					echo "exito";
				}							
				else{
					echo "error";
				}

		}
	}
?>