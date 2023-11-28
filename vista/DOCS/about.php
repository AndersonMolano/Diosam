<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800'><link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../CSS/timeline.css">
   <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap');
    </style>
    <link rel="stylesheet" href="../CSS/about.css">
    <title>Diosam</title>
</head>
<body>
    <header>
    <style>
    body {

        background-image: url('../IMG/fondo_orgiinal.jpg');
        background-size: cover; /* Ajusta la imagen al tamaño de la ventana del navegador */
        background-repeat: no-repeat; /* Evita la repetición de la imagen de fondo */
        background-attachment: fixed; /* Fija la imagen de fondo al desplazarse */
    }
</style>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a class="navbar-brand" href="#">
                        <img src="../IMG/logoDS.png" alt="Bootstrap" width="100" height="80">
                        <span class="texto">Diosam</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <nav>
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="../../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="galeria.php">Galería</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Conócenos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Visítanos</a>
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
                    </nav>
                </div>
            </div>
        </div>
    </header>
<br>
<br>
    <div class="container mt-5 " id="fundadora">
    <div class="row align-items-center">
        <div class="col-md-6 fundadora">
            <div class="image-container">
                <img src="../IMG/cep2.jpg" alt="Descripción de la imagen" class="img-fluid imagen-a">
                <div class="image-caption">
                    <div class="caption-content">Jackeline</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-container initial-position">
                <h2>Fundadora</h2>
                <p>Esta es la información que acompaña a la imagen. Puedes agregar más contenido aquí según tus necesidades.</p>
            </div>
        </div>
    </div>
</div>

<div class="container-2">
  <h1 class="title">Nuestra Historia</h1>
  <div class="timeline">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=11" data-year="2011">
          <div class="swiper-slide-content"><span class="timeline-year">2011</span>
            <h4 class="timeline-title">Our nice super title</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=12" data-year="2012">
          <div class="swiper-slide-content"><span class="timeline-year">2012</span>
            <h4 class="timeline-title">Our nice super title</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=13" data-year="2013">
          <div class="swiper-slide-content"><span class="timeline-year">2013</span>
            <h4 class="timeline-title">Our nice super title</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=14" data-year="2014">
          <div class="swiper-slide-content"><span class="timeline-year">2014</span>
            <h4 class="timeline-title">Our nice super title</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=15" data-year="2015">
          <div class="swiper-slide-content"><span class="timeline-year">2015</span>
            <h4 class="timeline-title">Our nice super title</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=16" data-year="2016">
          <div class="swiper-slide-content"><span class="timeline-year">2016</span>
            <h4 class="timeline-title">Our nice super title</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js'></script><script  src="./script.js"></script>
<script>
  var timelineSwiper = new Swiper ('.timeline .swiper-container', {
  direction: 'vertical',
  loop: false,
  speed: 1600,
  pagination: '.swiper-pagination',
  paginationBulletRender: function (swiper, index, className) {
    var year = document.querySelectorAll('.swiper-slide')[index].getAttribute('data-year');
    return '<span class="' + className + '">' + year + '</span>';
  },
  paginationClickable: true,
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  breakpoints: {
    768: {
      direction: 'horizontal',
    }
  }
});
</script>
     <?php include('vista/Templates_fm/footer.php'); ?>
     <?php content(); ?>
</body>
</html>





