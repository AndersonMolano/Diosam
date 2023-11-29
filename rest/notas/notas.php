<?php
include "../../rest/Config/config.php";
include "../../rest/Config/utils.php";


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

    // Crear variables con los datos necesarios para el template
    if (!empty($notifications)) {
        $notification = $notifications[0];
        $nombreUsuario = $notification['make_machine'] ?? '';
        $fechaAccion = $notification['time_notify'] ?? '';
    }
}
?>


