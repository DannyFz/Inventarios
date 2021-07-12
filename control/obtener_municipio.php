<?php
include "../db_config.php";
$estado = $_POST['id'];
$response = "";
    try{
        $stmt=$db_con->prepare("SELECT *,UPPER(nombre) as nombre_m FROM municipios WHERE estado_id =$estado ORDER BY nombre_m ASC");
        if($stmt->execute())
        {
        $response .= '<option value="seleccione">Selecciona Ciudad</option>';
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))        
        $response .= '<option value="'.$row["nombre_m"].'" >'.$row["nombre_m"].'</option>';
        echo utf8_encode($response);
        }
        else{
        echo "Ocurrio un problema";
        }
    }
    catch(PDOException $e){
    echo $e->getMessage();
    }
?>