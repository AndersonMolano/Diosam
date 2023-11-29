<?php
session_start();
require_once("../../modelo/conexion.php");

if (isset($_POST["registro"])) {

    $name = $_POST["name_user"];
    $lastname = $_POST["lastname_user"];
    $email = $_POST["email_user"];
    $password = $_POST["password_user"];

    $sql = $conexion->query("INSERT INTO usuario (name_user,lastname_user,email_user,password_user,role_user,state_user)
                            VALUES ('$name','$lastname','$email','$password','Empleado', 'activo')");

    $lastUserId = mysqli_insert_id($conexion); // Obtener el ID del usuario recién insertado

    if ($sql == 1) {
        echo '<div class="success">Usuario registrado correctamente</div>';

        // Insertar empleado
        $queryEmpleado = "INSERT INTO empleado (post_emple, idUserFK)
                          VALUES ('empleado', $lastUserId)";

        if (mysqli_query($conexion, $queryEmpleado)) {
            echo '<div class="success">Empleado registrado correctamente</div>';
        } else {
            echo '<div class="error">Error al registrar el empleado: ' . mysqli_error($conexion) . '</div>';
        }

        header("location: ../../index.php");
    } else {
        echo '<div class="error">Error al registrar el usuario</div>';
    }
}
?>
