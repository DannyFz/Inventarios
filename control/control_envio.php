<?php

require '../clases/class_producto.php';

$producto = new producto();

$metodo = $_POST['metodo'];

switch ($metodo) {
	case 'crear_producto':
		$proveedor = $_POST['proveedor'];
      	$sucursal  = $_POST['sucursal'];
      	$codigo    = $_POST['codigo'];
      	$nombre    = $_POST['nombre'];
      	$unidad    = $_POST['unidad'];
      	$costo     = $_POST['costo'];
      	$precio    = $_POST['precio'];
      	$cantidad  = $_POST['cantidad'];
      	$maximo    = $_POST['maximo'];
      	$minimo    = $_POST['minimo'];
      	$espacio   = $_POST['espacio'];

		$producto->crear_producto($proveedor,$sucursal,$codigo,$nombre,$unidad,$costo,$precio,$cantidad,$maximo,$minimo,$espacio);

		break;


      case 'obtener_producto':
            $codigo    = $_POST['codigo'];
            $folio    = $_POST['folio'];

            $producto->obtener_producto($folio,$codigo);

            break;      

}

?>