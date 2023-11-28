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
    <link rel="stylesheet" href="../CSS/galeria.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery antes de tu archivo JavaScript -->
    <script src="JS/scriptNavBar.js"></script> <!-- Incluye tu archivo JavaScript una sola vez -->
    <title>Diosam</title>
</head>
<body>

    
<style>
    body {

        background-image: url('../IMG/fondo_orgiinal.jpg');
        background-size: cover; 
        background-repeat: no-repeat; 
        background-attachment: fixed; 
    }
</style>
    <header>
    <script src="JS/scriptNavBar.js"></script>

    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
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
                        <a class="inicia-sesion" href="../../rest/Usuarios/usuarios.html">administrar Usuarios</a>
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
<h1>Explora Nuestra Galeria de Belleza</h1>
<br>
<br>
<br>

<div class="cont">
    <div class="row">
        <div class="col-md-6">
            <h4>Manicura</h4>
            <h5>Encontrarás expertos en uñas para lucir una manicura impecable.</h5>
            <br>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../IMG/manic1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/manic2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/manic3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
        <div class="col-md-6">
           
            <h4>Pedicura</h4>
            <h5>¡Reserva tu pedicura hoy mismo y experimenta la diferencia!</h5>
            <br>
            <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../IMG/pedic1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/pedic2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/pedic3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="cont">
    <div class="row">
        <div class="col-md-6">
            <h4>Cepillado</h4>
            <h5>Nuestros expertos en cepillado están listos para transformar tu estilo. </h5>
            <br>
            <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../IMG/cep1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/cep2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/cep3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
        <div class="col-md-6">
        
            <h4>Tintura</h4>
            <h5>Tu cabello en una obra maestra personalizada</h5>
            <br>
            <div id="carouselExampleControls4" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../IMG/tinte1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/tinte2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/tinte3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<div class="cont">
    <div class="row">
        <div class="col-md-6">
            <h4>Corte</h4>
            <h5>Encontrarás una amplia gama de cortes de cabello para hombre y mujer</h5>
            <br>
            <div id="carouselExampleControls5" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../IMG/corte1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/corte2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/corte3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls5" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls5" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
        <div class="col-md-6">
            
            <h4>Maquillaje</h4>
            <h5>Ofrecemos servicios de maquillaje excepcionales para realzar tu belleza</h5>
            <br>
            <div id="carouselExampleControls6" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../IMG/maq1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/maq2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../IMG/maq3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls6" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls6" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="fondo-diferente">
        <p></p>
    </div>

   <!-- Agrega este script al final de tu página, antes de cerrar la etiqueta </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.8.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Asegúrate de incluir Bootstrap -->

<script>
  // Función para activar el carrusel automático
  function activateCarousel(carouselId) {
    $('#' + carouselId).carousel({
      interval: 3000 // Cambia este valor para ajustar la velocidad (en milisegundos)
    });
  }

  // Activa cada carrusel
  activateCarousel('carouselExampleControls');
  activateCarousel('carouselExampleControls2');
  activateCarousel('carouselExampleControls3');
  activateCarousel('carouselExampleControls4');
  activateCarousel('carouselExampleControls5');
  activateCarousel('carouselExampleControls6');
</script>

  
  </body>
    <?php include('../Templates_fm/footer.php'); ?>
</html>