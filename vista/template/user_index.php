
<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="vista/CSS/template_user.css">

        <li>
            <button type="button" class="perfil_user">
              <img src="vista/IMG/User-logo.png" alt="perfil" id="abrirModal" style="width: 35px; height: 35px;">
            </button>
        </li>


    <script>
      // Obtén el valor del parámetro "email" de la URL
      var params = new URLSearchParams(window.location.search);
      var email = params.get("email");
    </script>

    <!-- Ventana modal, por defecto no visiblel -->
    <div id="ventanaModal" class="modal">
      <div class="modal-content">

        <span class="cerrar">&times;</span>
        <div class="email">
          <?php
          
          echo $_SESSION['email_user'];
          ?>
        </div>
<img src="vista/IMG/User-logo.png" alt="logo" class="user_logo">

        <div class="nombre">  
          <?php
          echo'¡Hola, ';
          echo $_SESSION[ 'name_user'];
          echo'!';
          ?>
       <form method="post" action="controlador/cerrar_sesion.php" class="cerrar_sesion">
    <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
    <button type="submit" class= "btn btn-danger">Actualizar informacion </button>
</form>

    </div>

    </div>

    <script>
      // Ventana modal
      var modal = document.getElementById("ventanaModal");

      // Botón que abre el modal
      var boton = document.getElementById("abrirModal");

      // Hace referencia al elemento <span> que tiene la X que cierra la ventana
      var span = document.getElementsByClassName("cerrar")[0];


      // Cuando el usuario hace clic en el botón, se abre la ventana
      boton.addEventListener("click", function() {
        modal.style.display = "block";
      });

      // Si el usuario hace clic en la x, la ventana se cierra
      span.addEventListener("click", function() {
        modal.style.display = "none";
      });

      // Si el usuario hace clic fuera de la ventana, se cierra.
      window.addEventListener("click", function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      });
    </script>