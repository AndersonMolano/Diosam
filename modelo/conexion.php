<?php

$server='localhost';
$username = 'root';
$password = '';
$database = 'jds_database';

$conexion = mysqli_connect("localhost", "root", "", "jds_database");
//$con = new mysqli($server,$password,$username,$database);

if($conexion-> connect_errno){

    
} else{
    
}

?>