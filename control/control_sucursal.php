<?php

require '../clases/class_sucursal.php';

$sucursal = new sucursal();

$metodo = $_POST['metodo'];

switch ($metodo) { 
	case 'registrar_sucursal_matriz':
		$ad_nombre  = $_POST['ad_nombre'];
		$ad_ape_p   = $_POST['ad_ape_p'];
		$ad_ape_m   = $_POST['ad_ape_m'];		
		$correo     = $_POST['correo'];
		$pass       = $_POST['pass']; 
		$nombre  = $_POST['nombre'];
		$estado  = $_POST['estado'];	
		$ciudad  = $_POST['ciudad'];
		$colonia = $_POST['colonia'];
		$calle   = $_POST['calle'];
		$cp      = $_POST['cp'];
		$num_ext = $_POST['num_ext'];
		$num_int = $_POST['num_int']; 
		
		$sucursal->registrar_sucursal_matriz($ad_nombre,$ad_ape_p,$ad_ape_m,$correo,$pass,$nombre,$estado,$ciudad,$colonia,$calle,$cp,$num_ext,$num_int);
		break;


	case 'obtener_sucursales':
        $matriz     = $_POST['matriz'];
        
        $sucursal->obtener_sucursales($matriz);
        break;


    case 'ver_sucursal':
        $id     = $_POST['id'];
        
        $sucursal->ver_sucursal($id);
        break; 


    case 'modal_editar_sucursal':
        $id     = $_POST['id'];
        
        $sucursal->modal_editar_sucursal($id);
        break;           

    case 'editar_sucursal':
		$id      = $_POST['id'];
		$nombre  = $_POST['nombre'];
		$colonia = $_POST['colonia'];
		$calle   = $_POST['calle'];
		$cp      = $_POST['cp'];
		$num_ext = $_POST['num_ext'];
		$num_int = $_POST['num_int']; 
		
		$sucursal->editar_sucursal($id,$nombre,$colonia,$calle,$cp,$num_ext,$num_int);
		break;    

    
    case 'cerrar_sucursal':
        $id     = $_POST['id'];
        
        $sucursal->cerrar_sucursal($id);
        break;               

    
    case 'ver_usuarios':
        $id     = $_POST['id'];
        
        $sucursal->ver_usuarios($id);
        break;     

    
    case 'modal_editar_usuario':
        $id     = $_POST['id'];
        
        $sucursal->modal_editar_usuario($id);
        break;           


    case 'editar_usuario':
        $id      = $_POST['id'];
        $nombre  = $_POST['nombre'];
		$ape_p   = $_POST['ape_p'];
		$ape_m   = $_POST['ape_m'];
		$correo  = $_POST['correo'];
		
        $sucursal->editar_usuario($id,$nombre,$ape_p,$ape_m,$correo);
        break;               


	case 'nueva_sucursal':
		$matriz  = $_POST['matriz'];
		$nombre  = $_POST['nombre'];
		$estado  = $_POST['estado'];	
		$ciudad  = $_POST['ciudad'];
		$colonia = $_POST['colonia'];
		$calle   = $_POST['calle'];
		$cp      = $_POST['cp'];
		$num_ext = $_POST['num_ext'];
		$num_int = $_POST['num_int']; 

		$sucursal->nueva_sucursal($matriz,$nombre,$estado,$ciudad,$colonia,$calle,$cp,$num_ext,$num_int);
		break; 

	
	case 'cerrar_sucursal':
        $id      = $_POST['id'];
        
        $sucursal->cerrar_sucursal($id);
        break;               	
		

	case 'crear_espacio':
		$id_sucursal  = $_POST['id_sucursal'];	
		$descripcion  = $_POST['descripcion'];
		
		$sucursal->crear_espacio($id_sucursal,$descripcion);
		break;	

	case 'crear_depto':
		$id_sucursal  = $_POST['id_sucursal'];	
		$nombre  = $_POST['nombre'];
		
		$sucursal->crear_depto($id_sucursal,$nombre);
		break;

	case 'subir_producto':
		$depto    = $_POST['depto'];	
		$codigo    = $_POST['codigo'];	
		$cantidad  = $_POST['cantidad'];
		
		$sucursal->subir_producto($depto,$codigo,$cantidad);
		break;			

	case 'obtener_sucursales_solicitud':
        $sucursal     = $_POST['sucursal'];
        
        $sucursal->obtener_sucursales_solicitud($sucursal);
        break;	

}

?>