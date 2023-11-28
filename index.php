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
    <link rel="stylesheet" href="vista/CSS/navbar.css">
    <link rel="stylesheet" href="vista/CSS/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery antes de tu archivo JavaScript -->
    <script src="JS/scriptNavBar.js"></script> <!-- Incluye tu archivo JavaScript una sola vez -->
    <title>Diosam</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap');

        body {
            background-image: url('vista/IMG/fondo_orgiinal.jpg');
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
        <a class="navbar-brand" href="index.php">
            <img src="vista/IMG/2.png" alt="" width="97" height="77">
        </a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i>Inicio</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="vista/DOCS/conocenos.php"><i class="far fa-clone"></i>Conócenos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vista/DOCS/visitanos.php"><i class="far fa-calendar-alt"></i>Visítanos</a>
                </li>
                <li class="nav-item">
                <?php
                    
                    if(isset($_SESSION['email_user']) && $_SESSION['rol'] == 1 ){
                        require_once("vista/template/user_index.php");
                        echo('<li class="nav-item">
                        <a class="inicia-sesion" href="rest/Usuarios/usuarios.html">administrar Usuarios</a>
                        </li>');
                        echo('<li class="nav-item">
                                <a class="inicia-sesion" href="vista/DOCS/registrar_servicio.php">Agregar servicio</a>
                                </li>');
                        
                    }else if(isset($_SESSION['email_user'])){ 
                        require_once("vista/template/user_index.php");

                        }else{
                            echo('<li class="nav-item">
                            <a class="inicia-sesion" href="vista/DOCS/login.php">Iniciar Sesión</a>
                            </li>');
                        }
                ?>                </li>
            </ul>
        </div>
        </nav>
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
    <div class="cards">
        <div class="card card-anim" style="width: 18rem;">
            <img src="vista/IMG/1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Servicios</h5>
              <p class="card-text">Conoce nuestros servicios y explora el poder de crear tu estilo junto a Diosam.</p>
              <a href="vista/DOCS/servicios.php" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" >Bienvenido</a>
            </div>
        </div>
        <div class="card card-anim" style="width: 18rem;">
            <img src="vista/IMG/reserva1.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Reservas</h5>
                <p class="card-text">Agenda una cita y prepárate para los cambios que tenemos preparados para ti.</p>
                <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Bienvenido</a>
            </div>
        </div>
        <div class="card card-anim" style="width: 18rem;">
    <img src="vista/IMG/cepilloo.png" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Galería</h5>
        <p class="card-text">Observa la calidad de nuestros trabajos por si quieres alguna referencia.</p>
        <a href="vista/DOCS/galeria.php" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" >Bienvenido</a>

    </div>
</div>
</div>
    <!-- Open Hours Start -->
    <div class="container-fluid py-5" style="margin-top: 70pc;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="vista/IMG/lisaa2.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="hours-text bg-light p-4 p-lg-5 my-lg-5">
                        <h6 class="d-inline-block text-white text-uppercase bg-primary py-1 px-2">Horario de Atención</h6>
                        <h1 class="mb-4">Colorimetría Personalizada: Tu Belleza Única</h1>
                        <p>En Diosam, consideramos que tu experiencia es única y excepcional. Nuestra dedicación a la colorimetría personalizada, manicura, pedicura y cortes de cabello va más allá de lo ordinario. Cada visita es una oportunidad para que te sientas especial y te sumerjas en un mundo de belleza y estilo a medida.</p>
                        <ul class="list-inline">
                            <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>Mon – Fri : 9:00 AM - 7:00 PM</li>
                            <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>Saturday : 9:00 AM - 6:00 PM</li>
                            <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>Sunday : Closed</li>
                        </ul>
                        <a href="javascript:void(0)" class="btn btn-danger" style="cursor: pointer; background-color: rgb(244, 210, 247); border-color: rgb(147 147 147); border-radius: 10px; transition: background-color 0.3s; outline: none; color: black;" onclick="showConfirmation()" >Bienvenido</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Open Hours End -->
    <div class="Unico-fondo">
        <p></p>
    </div>
    
    <script>
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 2000 
            });
        });
    </script>

        <br>
        <br>
        <br> 
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src="vista/JS/scriptNavBar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showConfirmation() {
            Swal.fire({
                title: '¿Quieres ingresar?',
                text: "¡Regístrate gratis para desbloquear todo nuestro contenido y explorar la página a fondo! 🌟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: ' #ff8181',
                cancelButtonColor: '#C5C5C5',
                confirmButtonText: 'Registrarme'
            }).then((result) => {
                if (result.isConfirmed) {
                    const loadingOverlay = document.createElement('div');
                    loadingOverlay.id = 'loading-overlay';
                    loadingOverlay.innerHTML = '<div class="loader"></div>';
                    document.body.appendChild(loadingOverlay);
                    setTimeout(() => {
                        window.location.href = 'vista/DOCS/registrarse.php';
                    }, 1000);
                }
            });
        }
    </script>
<br>
<br>
<br>
<?php include('vista/Templates_fm/footer.php'); ?>
    


</html>

