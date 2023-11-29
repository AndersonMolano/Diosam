<?php
session_start(); // Iniciar la sesión si aún no se ha hecho

$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];

$conexion = mysqli_connect("localhost:3307", "root", "", "jds_database");
$consulta = "SELECT * FROM usuario WHERE email_user='$email_user' AND password_user='$password_user'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);
$rol= mysqli_fetch_array($resultado);
        
if ($filas > 0) {
    // Inicio de sesión exitoso
    $_SESSION['email_user'] = $email_user; // Guarda el email en la sesión

    $consulta_nombre = "SELECT name_user FROM usuario WHERE email_user='$email_user'";
    $resultado_nombre = mysqli_query($conexion, $consulta_nombre);
    $fila_nombre = mysqli_fetch_assoc($resultado_nombre);
    $nombre_usuario = $fila_nombre['name_user'];

    $_SESSION['name_user'] = $nombre_usuario; // Guarda el nombre en la sesión

        if($rol['role_user'] == 'Empleado'){ // Si es Adminstrador:
            $_SESSION['rol'] = 1;
            header("location: ../index.php");
        
            }else if($rol['role_user'] == 'Cliente') { // Si es cliente
                $_SESSION['rol'] = 2;
                header("location: ../vista/DOCS/servicios.php");
            }
   
        } else {
            echo "Joap";
        }



//mysqli_free_result($resultado);
// mysqli_free_result($resultado_nombre);

?>
