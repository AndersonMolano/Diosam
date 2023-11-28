<?php
    require_once("../../modelo/conexion.php");
    

    if (isset($_POST["registro_cita"])) {
        $servicio = $_POST["selectServicio"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $datetime = $fecha . ' ' . $hora;
    
        if (isset($_SESSION['email_user'])) {
            $email = $_SESSION['email_user'];
            $consulta_servicio = "SELECT id_servi FROM servicio WHERE id_Servi = $servicio";
            $resultado_servi = mysqli_query($conexion, $consulta_servicio);
    
            if ($resultado_servi) {
                $fila_servi = mysqli_fetch_assoc($resultado_servi);
                $id_servicio = $fila_servi['id_servi'];
    
                $consulta_cliente = "SELECT c.id_client
                    FROM cliente AS c
                    INNER JOIN usuario AS u ON c.idUserFk = u.id_user
                    WHERE u.email_user = '$email'";
    
                $resultado_cliente = mysqli_query($conexion, $consulta_cliente);
                $fila_cliente = mysqli_fetch_assoc($resultado_cliente);
                $id_cliente = $fila_cliente['id_client'];
    
                if ($datetime && $id_servicio && $id_cliente) {
                    $sql = $conexion->query("INSERT INTO cita (date_meet, idServiFk, idClieFK) VALUES ('$datetime', $id_servicio, $id_cliente)");
                    // Resto del código
                } else {
                    echo "Alguna de las variables es nula o indefinida.";
                }
                
                if ($sql) {
                    echo '<div class="success">Cita registrada correctamente</div>';
                } else {
                    echo '<div class="danger">Error al registrar la cita: ' . mysqli_error($conexion) . '</div>';
                }
            } else {
                echo "Error en la consulta de servicio: " . mysqli_error($conexion);
            }
        } else {
            echo '<div class="danger">No se ha iniciado sesión</div>';
        }
    }
    



?>