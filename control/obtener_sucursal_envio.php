<?php
include "../db_config.php";
$sucursal = $_POST['sucursal'];
$response = "";
    try{
        $stmt=$db_con->prepare("SELECT * FROM sucursal WHERE id = '$sucursal' OR matriz='$sucursal'");
        if($stmt->execute())
        {
        $response .= '<option value="" selected>Selecciona Sucursal</option>';          
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))  
        $response .= '<option value="'.$row["id"].'" >'.$row["nombre"].'</option>';
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