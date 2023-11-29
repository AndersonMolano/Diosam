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
            padding: 10px;
            text-align: center;
            border: 4px solid rgb(52, 0, 52);
            transition: right 1s ease; /* Agregar transición para la propiedad right */
        }
    
        #miVentanaInferior.mostrar {
            right: 0; /* Mostrar en la posición correcta */
        }
    
        #miVentanaInferior.ocultar {
            right: -700px; /* Volver a la posición inicial al ocultar */
        }
    </style>
    

    <div id="miVentanaInferior" class="notificacion">
    <?php
    include('rest/Maquinas/recordar_maquinas.php');
    ?>
    <p>Recuerda que la máquina <?php echo $nombreUsuario; ?> tiene una fecha de mantenimiento para el día <?php echo $fechaAccion; ?>.</p>
    </div>


<script>
   

    setTimeout(function() {
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