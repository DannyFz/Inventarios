<?php

require '../clases/class_proveedor.php';

$proveedor = new proveedor();

$metodo = $_POST['metodo'];

switch ($metodo) {
	case 'crear_proveedor':
		
	$sucursal     = $_POST['sucursal'];
        $nombre       = $_POST['nombre'];
        $razon_social = $_POST['razon_social'];
        $estado       = $_POST['estado'];
        $ciudad       = $_POST['ciudad'];
        $colonia      = $_POST['colonia'];
        $calle        = $_POST['calle'];
        $cp           = $_POST['cp'];
        $num_ext      = $_POST['num_ext'];
        $num_int      = $_POST['num_int'];
        $tel          = $_POST['tel'];
        $url          = $_POST['url'];
        $correo       = $_POST['correo'];

	$proveedor->crear_proveedor($sucursal,$nombre,$razon_social,$estado,$ciudad,$colonia,$calle,
                $cp,$num_ext,$num_int,$tel,$url,$correo);

	break;


        case 'obtener_proveedor':
                
        $sucursal     = $_POST['sucursal'];
        
        $proveedor->obtener_proveedor($sucursal);

        break;

        case 'ver_proveedor':
                
                $id     = $_POST['id'];
                
                $proveedor->ver_proveedor($id);
        
                break;

         case 'modal_editar_proveedor':
                 $id     = $_POST['id'];
                        
                $proveedor->modal_editar_proveedor($id);
                break;           
                
                
        case 'editar_proveedor':
                $id            = $_POST['id'];
                $nombre        = $_POST['nombre'];
                $razon_social  = $_POST['razon_social'];
                $estado        = $_POST['estado'];
                $ciudad        = $_POST['ciudad'];
                $colonia       = $_POST['colonia'];
                $calle         = $_POST['calle'];
                $cp            = $_POST['cp'];
                $num_ext       = $_POST['num_ext'];
                $num_int       = $_POST['num_int'];
                $tel           = $_POST['tel'];
                $correo        = $_POST['correo'];
                $url           = $_POST['url'];

                $proveedor->editar_proveedor($id,$nombre,$razon_social,$estado,$ciudad,$colonia,$calle,$cp,$num_ext,$num_int,
                $tel,$correo,$url);
                        break;   
                        
        case 'eliminar_proveedor':
                $id     = $_POST['id'];
                    
                $proveedor->eliminar_proveedor($id);
                break;

}

?>