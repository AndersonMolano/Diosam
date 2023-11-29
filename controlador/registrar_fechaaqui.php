<?php
// Agrega estas líneas en la parte superior del script para conectar a la base de datos
include_once "../../rest/Config/config.php";
include "../../rest/Config/utils.php";

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registro_notificacion'])) {
    // Conectar a la base de datos
    $dbConn = connect($db);

    // Obtener datos del formulario
    $time_notify = $_POST['time_notify'];
    $idMachineFK = $_POST['idMachineFK'];
    $idEmpleFK = $_POST['idEmpleFK'];

    // Preparar la consulta SQL para insertar la notificación
    $sql = $dbConn->prepare("
        INSERT INTO notificacion_maqui (time_notify, idMachineFK, idEmpleFK)
        VALUES (:time_notify, :idMachineFK, :idEmpleFK)
    ");

    // Bind de parámetros
    $sql->bindParam(':time_notify', $time_notify, PDO::PARAM_STR);
    $sql->bindParam(':idMachineFK', $idMachineFK, PDO::PARAM_INT);
    $sql->bindParam(':idEmpleFK', $idEmpleFK, PDO::PARAM_INT);

    // Ejecutar la consulta
    $result = $sql->execute();

    // Verificar el resultado de la inserción
    if ($result) {
        echo "Notificación registrada correctamente.";
    } else {
        echo "Error al registrar la notificación.";
    }
}
?>
