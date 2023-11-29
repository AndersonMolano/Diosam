<?php

$server='localhost:3007';
$username = 'root';
$password = '';
$database = 'jds_database';

$conexion = mysqli_connect("localhost:3307", "root", "", "jds_database");
//$con = new mysqli($server,$password,$username,$database);

if($conexion-> connect_errno){

    
} else{
    
}

?>