<?php
  session_start();
  require_once("../../modelo/conexion.php");
  include("../../controlador/registrar_fechaaqui.php");

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
    <link rel="stylesheet" href="../CSS/docs.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery antes de tu archivo JavaScript -->
    <script src="JS/scriptNavBar.js"></script> <!-- Incluye tu archivo JavaScript una sola vez -->
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
                        <a class="nav-link opcion text-dark font-weight-bold text-center h4" href="administrador.php">Administrar Usuarios</a>
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
    
    <?php
// Agrega estas líneas en la parte superior de tu script para conectar a la base de datos
include "../../rest/Config/config.php";
include "../../rest/Config/utils.php";

$dbConn = connect($db);

// Consulta para obtener la lista de máquinas
$queryMaquinas = $dbConn->query("SELECT id_machine, make_machine FROM maquinas");
$maquinas = $queryMaquinas->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
// Consulta para obtener la lista de empleados con sus nombres de usuario
$queryEmpleados = $dbConn->query("
    SELECT e.id_emple, e.post_emple, u.name_user
    FROM empleado e
    LEFT JOIN usuario u ON e.idUserFK = u.id_user
");
$empleados = $queryEmpleados->fetchAll(PDO::FETCH_ASSOC);
?>


<form method="POST" class="login-form">
    <h2>Registra una nueva notificación</h2>
    <div class="form-floating mb-3">
        <input type="datetime-local" class="form-control" name="time_notify" id="time_notify" required="required">
        <label for="floatingInput">Selecciona la fecha y hora de la notificación</label>
    </div>

    <!-- Dropdown para seleccionar la máquina -->
    <div class="form-floating mb-3">
        <select class="form-select" name="idMachineFK" id="idMachineFK" required="required">
            <option value="" disabled selected>Selecciona una máquina</option>
            <?php foreach ($maquinas as $maquina): ?>
                <option value="<?= $maquina['id_machine']; ?>"><?= $maquina['make_machine']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="idMachineFK">Selecciona la máquina</label>
    </div>

    <!-- Dropdown para seleccionar el empleado -->
    <div class="form-floating mb-3">
        <select class="form-select" name="idEmpleFK" id="idEmpleFK" required="required">
            <option value="" disabled selected>Selecciona un empleado</option>
            <?php foreach ($empleados as $empleado): ?>
                <option value="<?= $empleado['id_emple']; ?>"><?= $empleado['name_user'] . ' - ' . $empleado['post_emple']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="idEmpleFK">Selecciona el empleado</label>
    </div>

    <br>
    <div class="button-danger">
        <input type="submit" class="btn btn-danger" value="Ingresar" name="registro_notificacion"></input>
    </div>
    <br>
    <br>
</form>



</body>
<br>
<br>
<br>
<br>

<?php include('../Templates_fm/footer.php'); ?>
    </html>