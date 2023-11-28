<?php
session_start();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión o a donde desees
header("location: ../index.php"); // Cambia "login.php" por la URL real de tu página de inicio de sesión
exit();
?>
