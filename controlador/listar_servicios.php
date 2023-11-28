<?php
    require_once("../../modelo/conexion.php");
    
    $consulta_servicios = "SELECT COUNT(id_servi) FROM servicio";
    $resultado = mysqli_query($conexion, $consulta_servicios);
    $total = mysqli_fetch_array($resultado);
    $total_servicios = $total['COUNT(id_servi)'];
    


?>