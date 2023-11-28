<?php
session_start();
require_once("../../modelo/conexion.php");

if (isset($_POST["registro_servi"])) {

    if (isset($_POST["type_servi"])){
        
    }
    
        $type=$_POST["type_servi"];
        $description=$_POST["descrip_servi"];
        $price=$_POST["price_servi"];
        
        $sql=$conexion->query(" insert into servicio (price_servi,type_servi,descrip_servi)
                                values('$price','$type','$description')");

        

        if ($sql ==1){
            echo '<div class="success>Servicio registrado correctamente</div>';
            
            }else {
                echo '<div class="success>Servicio registrado correctamente</div>';
            }
 
}
?>