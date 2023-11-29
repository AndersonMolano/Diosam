<?php
session_start();
require_once("../../modelo/conexion.php");

if (isset($_POST["registro_user"])) {

    
    
        $name=$_POST["name_user"];
        $lastname=$_POST["lastname_user"];
        $email=$_POST["email_user"];
        $password=$_POST["password_user"];
        $sql=$conexion->query(" insert into usuario (name_user,lastname_user,email_user,password_user,role_user,state_user)
                                values('$name','$lastname','$email','$password',2,1) ");


        $lastUserId = mysqli_insert_id($conexion);
        $consulta = "SELECT role_user FROM usuario WHERE id_user='$lastUserId'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila_rol = mysqli_fetch_assoc($resultado);
        $rol_value = $fila_rol['role_user'];

        if ($sql ==1){
            echo '<div class="success">Usuario registrado correctamente</div>';

            if ($rol_value == 'Cliente') {
              
                $phone = '11111111'; // Puedes ajustar esto según tus necesidades

                $query = "INSERT INTO cliente (phone, idUserFK) VALUES ('$phone', $lastUserId)";
                if (mysqli_query($conexion, $query)) {
                    echo '<div class="success">Empleado registrado correctamente</div>';

                } else {
                    echo '<div class="error">Error al registrar el empleado: ' . mysqli_error($conexion) . '</div>';
                }
            }
            
            
            
            
            
            header("location: ../../index.php");
            }else {
                echo '<div class="success>Usuario registrado correctamente></div>';
            }
 
}
?>