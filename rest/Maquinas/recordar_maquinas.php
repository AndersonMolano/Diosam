<?php
include "../Config/config.php";
include "../Config/utils.php";

$dbConn = connect($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Consulta con JOIN para obtener nombres en lugar de IDs
    $sql = $dbConn->prepare("
        SELECT nm.id_notify, nm.time_notify, m.make_machine, u.name_user AS empleado_name
        FROM notificacion_maqui nm
        LEFT JOIN maquinas m ON nm.idMachineFK = m.id_machine
        LEFT JOIN empleado e ON nm.idEmpleFK = e.id_emple
        LEFT JOIN usuario u ON e.idUserFK = u.id_user
    ");
    $sql->execute();
    $notifications = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Crear una respuesta JSON con la lista de notificaciones
    $response = json_encode($notifications);

    // Devolver la respuesta con cabeceras CORS para permitir el acceso desde cualquier origen
    header("HTTP/1.1 200 OK");
    header("Access-Control-Allow-Origin: *"); // Permitir acceso desde cualquier origen
    header("Content-Type: application/json");
    echo $response;
}


// recordar_maquinas.php
function obtenerInformacionMaquina() {
    // Realizar la lógica de la consulta para obtener la información de la máquina
    // Aquí deberías conectar a la base de datos y ejecutar tu consulta
    // Supongamos que obtienes el nombre y la fecha de mantenimiento de alguna manera
    $nombreMaquina = "Nombre de la Máquina"; // Reemplazar con la lógica de tu consulta
    $fechaMantenimiento = "Fecha de Mantenimiento"; // Reemplazar con la lógica de tu consulta

    // Devolver la información como un array asociativo
    return [
        'nombre' => $nombreMaquina,
        'fecha_mantenimiento' => $fechaMantenimiento,
    ];
}


