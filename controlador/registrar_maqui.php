<?php
session_start();
require_once("../../modelo/conexion.php");

if (isset($_POST["registro_maqui"])) {

    if (isset($_POST["type_servi"])){
        
    }
    
        $make=$_POST["make_machine"];
        $type=$_POST["type_machine"];
        
        
        $sql=$conexion->query(" insert into maquinas (make_machine,type_machine)
                                values('$make','$type')");

        

        if ($sql ==1){
            echo '<div class="success>Maquina registrado correctamente</div>';
            
            }else {
                echo '<div class="success>Maquina registrado correctamente</div>';
            }
 
}
?>