<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/servicios.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery antes de tu archivo JavaScript -->
    <script src="JS/scriptNavBar.js"></script> <!-- Incluye tu archivo JavaScript una sola vez -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap');

        body {
            background-image: url('../IMG/fondo_orgiinal.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
        }

        .navbar-brand img {
            border-radius: 50%;
            width: 70.5px;
            height: 60.5px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand" href="../../index.php">
            <img src="../IMG/2.png" alt="" width="97" height="77">
        </a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php"><i class="fas fa-tachometer-alt"></i>Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="conocenos.php"><i class="far fa-clone"></i>Conócenos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="visitanos.php"><i class="far fa-calendar-alt"></i>Visítanos</a>
                </li>
                <li class="nav-item">
                <?php
                            
                            if(isset($_SESSION['email_user']) && $_SESSION['rol'] == 1 ){
                                require_once("../template/user_log.php");
                                echo('<li class="nav-item">
                                <a class="inicia-sesion" href="../../rest/Admin/admin.html">administrar Usuarios</a>
                                </li>');
                                echo('<li class="nav-item">
                                <a class="inicia-sesion" href="registrar_servicio.php">Agregar servicio</a>
                                </li>');
                                
                            }else if(isset($_SESSION['email_user'])){ 
                                require_once("../template/user_log.php");

                                }else{
                                    echo('<li class="nav-item">
                                    <a class="inicia-sesion" href="login.php">Iniciar Sesión</a>
                                    </li>');
                                }
                    ?>               
                 </li>
            </ul>
        </div>
        <script>
        function test(){
	var tabsNewAnim = $('#navbarSupportedContent');
	var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
	var activeItemNewAnim = tabsNewAnim.find('.active');
	var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
	var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
	var itemPosNewAnimTop = activeItemNewAnim.position();
	var itemPosNewAnimLeft = activeItemNewAnim.position();
	$(".hori-selector").css({
		"top":itemPosNewAnimTop.top + "px", 
		"left":itemPosNewAnimLeft.left + "px",
		"height": activeWidthNewAnimHeight + "px",
		"width": activeWidthNewAnimWidth + "px"
	});
	$("#navbarSupportedContent").on("click","li",function(e){
		$('#navbarSupportedContent ul li').removeClass("active");
		$(this).addClass('active');
		var activeWidthNewAnimHeight = $(this).innerHeight();
		var activeWidthNewAnimWidth = $(this).innerWidth();
		var itemPosNewAnimTop = $(this).position();
		var itemPosNewAnimLeft = $(this).position();
		$(".hori-selector").css({
			"top":itemPosNewAnimTop.top + "px", 
			"left":itemPosNewAnimLeft.left + "px",
			"height": activeWidthNewAnimHeight + "px",
			"width": activeWidthNewAnimWidth + "px"
		});
	});
}
$(document).ready(function(){
	setTimeout(function(){ test(); });
});
$(window).on('resize', function(){
	setTimeout(function(){ test(); }, 500);
});
$(".navbar-toggler").click(function(){
	$(".navbar-collapse").slideToggle(300);
	setTimeout(function(){ test(); });
});

// --------------add active class-on another-page move----------
jQuery(document).ready(function($){
	// Get current path and find target link
	var path = window.location.pathname.split("/").pop();

	// Account for home page with empty path
	if ( path == '' ) {
		path = 'index.html';
	}

	var target = $('#navbarSupportedContent ul li a[href="'+path+'"]');
	// Add active class to target link
	target.parent().addClass('active');
});
</script>
    </nav>
    </header> 
    <br>
    <br>
    

    <h1>Explora Nuestros Servicios de Belleza</h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="../IMG/colorimetria.png" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Colorimetria</h5>
                    <p class="card-text">Explora la paleta de colores infinita para tu cabello con nuestra colorimetría experta, Cada tono es una expresión única de tu personalidad!</p>
                    <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../IMG/mauqillajes.png" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Maquillajes</h5>
                    <p class="card-text">Transforma tu belleza con nuestros maquillajes de ensueño. Descubre un mundo de colores y realza tu estilo único.</p>
                    <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../IMG/manicura.png" class="card-img-top" alt="Servicio 3">
                <div class="card-body">
                    <h5 class="card-title">Manicura</h5>
                    <p class="card-text">Embellece tus manos y realza tu elegancia con nuestra manicura experta. Cada uña es una obra maestra en sí misma.</p>
                    <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
<div class="row">
<div class="col-md-4">
    <div class="card">
        <img src="../IMG/pedicura.png" class="card-img-top" alt="Servicio Adicional">
        <div class="card-body">
            <h5 class="card-title">Pedicura</h5>
            <p class="card-text">Da un paso hacia la elegancia y cuidado de pies impecables con nuestra pedicura de lujo. Cada paso te llevará más cerca de la comodidad.</p>
            <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <img src="../IMG/peinado1.png" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">Peinados</h5>
            <p class="card-text">Descubre la magia de nuestros peinados y experimenta un look único para cada ocasión, transforma tu cabello y estilo con nosotros!</p>
            <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>

        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <img src="../IMG/cortedama.png" class="card-img-top" alt="Otro Servicio">
        <div class="card-body">
            <h5 class="card-title">Cortes para Dama</h5>
            <p class="card-text">Descubre la elegancia en cada corte con nuestros servicios de cortes de cabello para damas. Conoce cual te luce mas! </p>
            <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>

        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <img src="../IMG/cortehombre.png" class="card-img-top" alt="Otro Servicio">
        <div class="card-body">
            <h5 class="card-title">Cortes para Caballero</h5>
            <p class="card-text">Experimenta la perfección en cada corte con nuestros servicios de cortes de cabello para caballeros. Dale a tu cabello el cuidado que merece! </p>
            <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>

        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <img src="../IMG/plachado.png" class="card-img-top" alt="Otro Servicio">
        <div class="card-body">
            <h5 class="card-title">Cepillado y planchado</h5>
            <p class="card-text">Transforma tu cabello en una obra de arte con nuestros servicios de cepillado y planchado quedaras con un hermoso look suave y pulido.</p>
            <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>

        </div>
    </div>
</div>

    <div class="col-md-4">
        <div class="card">
            <img src="../IMG/keratina.png" class="card-img-top" alt="Otro Servicio">
            <div class="card-body">
                <h5 class="card-title">Keratina</h5>
                <p class="card-text">Devuélvele la vida y la vitalidad a tu cabello con nuestro tratamiento de keratina de alta calidad. La keratina restaurará y fortalecerá tu cabello.</p>
                <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Reservar cita</a>

            </div>
        </div>
</div>
</div>
</div>
<br>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src="vista/JS/scriptNavBar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showConfirmation() {
        window.location.href = 'registrarcita.php'; 
        }
    </script>

</body>
<br>
<br>
<br>
<?php include('../Templates_fm/footer.php'); ?>
    


</html>





    