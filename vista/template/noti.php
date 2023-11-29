<?php
include('../../rest/notas/notas.php')
?>
<style>
    #miVentanaInferior {
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
        position: fixed;
        bottom: 0;
        right: -700px; /* Inicialmente fuera de la pantalla hacia la derecha */
        height: 300px;
        width: 500px;
        background-color: rgb(189, 139, 193);
        padding: 20px; /* Aumenté el padding para mayor espacio alrededor del texto */
        text-align: center;
        border: 4px solid rgb(52, 0, 52);
        transition: right 1s ease; /* Agregar transición para la propiedad right */
        font-family: 'Arial', sans-serif; /* Establecer la fuente */
    }

    #miVentanaInferior p {
        font-size: 18px; /* Tamaño de fuente para el párrafo */
        color: #fff; /* Color del texto */
        margin: 10px 0; /* Margen superior e inferior para el párrafo */
    }

    #miVentanaInferior.mostrar {
        right: 0; /* Mostrar en la posición correcta */
    }

    #miVentanaInferior.ocultar {
        right: -700px; /* Volver a la posición inicial al ocultar */
    }
</style>

<div id="miVentanaInferior" class="notificacion">
    <?php if (!empty($nombreUsuario) && !empty($fechaAccion)) : ?>
        <p>Recuerda que la máquina <?php echo $nombreUsuario; ?> tiene una fecha de mantenimiento para el día <?php echo $fechaAccion; ?>.</p>
    <?php else : ?>
        <p>No hay notificaciones disponibles.</p>
    <?php endif; ?>
</div>

<script>
    setTimeout(function () {
        document.getElementById('miVentanaInferior').classList.add('mostrar');
    }, 500);

    // Desaparecer después de 5 segundos
    setTimeout(function () {
        document.getElementById('miVentanaInferior').classList.remove('mostrar');
        document.getElementById('miVentanaInferior').classList.add('ocultar');
    }, 5000);

    // Mostrar la ventana inferior nuevamente después de ocultarla
    setTimeout(function () {
        document.getElementById('miVentanaInferior').classList.remove('ocultar');
        document.getElementById('miVentanaInferior').style.display = 'none';
    }, 6000);
</script>

