<?php
   session_start();
   session_destroy();
   
   if(isset($_SESSION['name_user'])) {

      // El usuario está logueado, redirigirlo a la página de recepción de citas
      header('Location: ../Vista/DOCS/registrarcita.php ');
      exit();
    } else {

      // El usuario no está logueado, mostrar una alerta y redirigirlo a la página de inicio de sesión
      echo '<script>alert("NO xd")</script>';
      header('Location: ../Vista/DOCS/servicios.php?alert=1 ');
      
      exit();
    }

?>