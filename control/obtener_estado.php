<?php
include "../db_config.php";
$response = "";
    try{
        $stmt=$db_con->prepare("SELECT * FROM estados");
        if($stmt->execute())
        {
        $response .= '<option value="" selected>Selecciona Estado</option>';
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))        
        $response .= '<option state="'.$row['id'].'" value="'.$row['nombre'].'">'.$row["nombre"].'</option>';
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