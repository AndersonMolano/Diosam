<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/conocs.css">
    <link rel="stylesheet" href="../CSS/.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Diosam</title>

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
                    session_start();
                    if(isset($_SESSION['email_user']) && $_SESSION['rol'] == 1 ){
                        require_once("../template/user_log.php");
                        echo('<li class="nav-item">
                        <a class="inicia-sesion" href="vista/DOCS/administrador.phpl">administrar Usuarios</a>
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
<br>
    <section class="about-us">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-md-5">
            <div class="hdg-blck-1">
                <h3>Nuestra Fundadora</h3>
                <p>
                    Pitchfork selfies master cleanse Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up
                    artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four
                    loko tempor duis single-origin coffee. Banksy, elit small batch freegan sed.
                </p>
                <h6>JACKELINE SAMBONI - PROPIETARIA Y FUNDADORA</h6>
            </div>
        </div>
        <div class="col-md-5">
        <img src="../IMG/fundadora.jpg" alt="" style="width: 30pc; height: 30pc;">
        </div>
    </div>
</div>

                <div class="col-md-7">
                    <img src="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
 <br>
 <br>

    <div class="container">
        <div class="hdg-blck-1">
            <h6>
                Rooms Suites
            </h6>
            <h3>
                Our Executive Team
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://themes.getmotopress.com/luviana/wp-content/uploads/sites/27/2019/07/team-1-1024x1024.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Brandon Montgomery</h5>
                        <h6 class="card-subtitle">Brandon Montgomery</h6>

                        <p class="card-text">While working I do my best to meet all the requirements people have
                            and
                            maintain
                            order in staff..</p>
                        <hr>
                        <div class="social-icons">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                            <i class="fab fa-whatsapp    "></i>
                            <i class="fab fa-instagram    "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://themes.getmotopress.com/luviana/wp-content/uploads/sites/27/2019/07/team-2-1024x1024.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Brandon Montgomery</h5>
                        <h6 class="card-subtitle">Brandon Montgomery</h6>

                        <p class="card-text">While working I do my best to meet all the requirements people have
                            and
                            maintain
                            order in staff..</p>
                        <hr>
                        <div class="social-icons">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                            <i class="fab fa-whatsapp    "></i>
                            <i class="fab fa-instagram    "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://themes.getmotopress.com/luviana/wp-content/uploads/sites/27/2019/07/team-3-1024x1024.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Brandon Montgomery</h5>
                        <h6 class="card-subtitle">Brandon Montgomery</h6>

                        <p class="card-text">While working I do my best to meet all the requirements people have
                            and
                            maintain
                            order in staff..</p>
                        <hr>
                        <div class="social-icons">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                            <i class="fab fa-whatsapp    "></i>
                            <i class="fab fa-instagram    "></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</div>
 <br>
 <br>

        <section class="about-us-page-inner">
            <div class="container">
                <div class="row align=items-center">
                    <div class="col-md-6">
                        <div class="hdg-blck-1">
                            <h6>
                                Nuestras Instalaciones
                            </h6>
                            <h3>
                               Bienvenidos a Diosam
                            </h3>
                            <div>
                                <!-- p is used just to target it for now  -->
                                <p>
                                    Pitchfork selfies master cleanse Kickstarter seitan retro. Drinking vinegar
                                    stumptown yr
                                    pop-up
                                    artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat
                                    flexitarian
                                    four loko tempor duis single-origin coffee. Banksy, elit small batch freegan sed.
                                </p>
                            </div>
                            <img src="img/signature.png" class="w-50" alt="">
                            <h6>RICARD MORGAN - GENERAL MANAGER</h6>
                        </div>
                    </div>
                    <div class="col-md-6 lblck">
                        <div>
                        <br>
                        <br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores facere sapiente sit
                                praesentium
                                iste
                                distinctio voluptatibus non tempore quas aliquid quos unde impedit ut, corrupti rerum ad
                                architecto
                                minima deleniti, ducimus velit exercitationem culpa quasi neque? Repellendus dolorem,
                                aliquam
                                amet
                                corrupti harum doloremque magni, velit esse deleniti necessitatibus doloribus voluptatum
                                fuga
                                saepe
                                dicta, ad consequuntur ipsa vel facere repudiandae placeat recusandae natus minima
                                quibusdam?
                                Dolorem
                                deleniti, fuga perferendis maiores numquam libero at adipisci, non quibusdam cum
                                repellat
                                blanditiis
                                consequuntur laudantium.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <img src="https://themes.getmotopress.com/luviana/wp-content/uploads/sites/27/2019/07/welcome-1-1-1024x1024.jpg"
                            alt="" class="d-block w-100">
                    </div>
                    <div class="col-md-6 ">
                        <img src="https://themes.getmotopress.com/luviana/wp-content/uploads/sites/27/2019/07/welcome-2-1-1024x1024.jpg"
                            alt="" class="d-block w-100">
                    </div>
                </div>

                <div class="row text-only">
                    <div class="col-md-6">
                        <div class="hdg-blck-1">
                            <h6>
                                <br>
                                <br>
                                
                                Rooms Suites
                            </h6>
                            <h3>
                                Rooms & Luxury Suites

                            </h3>
                            <p>
                                Pitchfork selfies master cleanse Kickstarter seitan retro. Drinking vinegar stumptown yr
                                pop-up
                                artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat
                                flexitarian
                                four loko tempor duis single-origin coffee. Banksy, elit small batch freegan sed.</p>
                        </div>
                    </div>
                    <div class="col-md-6 lblck">
                        <div>
                        <br>
                        <br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores facere sapiente sit
                                praesentium
                                iste
                                distinctio voluptatibus non tempore quas aliquid quos unde impedit ut, corrupti rerum ad
                                architecto
                                minima deleniti, ducimus velit exercitationem culpa quasi neque? Repellendus dolorem,
                                aliquam
                                amet
                                corrupti harum doloremque magni, velit esse deleniti necessitatibus doloribus voluptatum
                                fuga
                                saepe
                                dicta, ad consequuntur ipsa vel facere repudiandae placeat recusandae natus minima
                                quibusdam?
                                Dolorem
                                deleniti, fuga perferendis maiores numquam libero at adipisci, non quibusdam cum
                                repellat
                                blanditiis
                                consequuntur laudantium.</p>
                        </div>
                    </div>
                </div>

            </div>
<br>
<br>
<br>

<?php include('../Templates_fm/footer.php'); ?>
    </html>


