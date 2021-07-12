<?php

require '../clases/class_producto.php';

$producto = new producto();

$metodo = $_POST['metodo'];

switch ($metodo) {

      case 'lista_proveedores':
            $sucursal     = $_POST['sucursal'];
            
            $producto->lista_proveedores($sucursal);

            break;       

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
      	

		$producto->crear_producto($proveedor,$sucursal,$codigo,$nombre,$unidad,$costo,$precio,$cantidad,$maximo,$minimo);

		break;

      case 'obtener_productos_sucursal':
            $matriz     = $_POST['matriz'];
            

            $producto->obtener_productos_sucursal($matriz);

            break;       


      case 'obtener_producto':
            $folio     = $_POST['folio'];
            $codigo    = $_POST['codigo'];
            $cantidad  = $_POST['cantidad'];

            $producto->obtener_producto($folio,$codigo,$cantidad);

            break; 


      case 'buscar_producto':
            $sucursal  = $_POST['sucursal'];
            $nombre    = $_POST['nombre'];
            
            $producto->buscar_producto($sucursal,$nombre);

            break; 

      
      case 'actualizar_producto':
            $id       = $_POST['id'];
            $cantidad = $_POST['cantidad'];
            $codigo = $_POST['codigo'];
            
            $producto->actualizar_producto($id,$cantidad,$codigo);

            break;       


      case 'agregar_busqueda_producto':
            $folio     = $_POST['folio'];
            $codigo    = $_POST['codigo'];
            $cantidad  = $_POST['cantidad'];
            
            $producto->agregar_busqueda_producto($folio,$codigo,$cantidad);

            break;            


      case 'eliminar_producto':
            $id     = $_POST['id'];

            $producto->eliminar_producto($id);

            break;       


      case 'crear_venta':
            $folio     = $_POST['folio'];
            $usuario   = $_POST['usuario'];
            $sucursal  = $_POST['sucursal'];
            $producto->crear_venta($folio,$usuario,$sucursal);

            break;       

      case 'cancelar_venta':
            $folio     = $_POST['folio'];
            
            $producto->cancelar_venta($folio);

            break;      


      case 'obtener_producto_envio':
            $folio     = $_POST['folio'];
            $codigo    = $_POST['codigo'];
            $cantidad  = $_POST['cantidad'];

            $producto->obtener_producto_solicitud($folio,$codigo,$cantidad);

            break;            

            case 'ver_almacen':
                
                  $id     = $_POST['id'];
                  
                  $producto->ver_almacen($id);
          
                  break;
}

?>