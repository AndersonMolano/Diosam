<?php
include "../Config/config.php";
include "../Config/utils.php";

$dbConn = connect($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        // Consulta todas las citas con información de usuario y servicio
        $sql = $dbConn->prepare("
            SELECT cita.*, usuario.name_user as nombreUsuario, servicio.type_servi as nombreServicio
            FROM cita
            LEFT JOIN cliente ON cita.idClieFK = cliente.id_client
            LEFT JOIN usuario ON cliente.idUserFk = usuario.id_user
            LEFT JOIN servicio ON cita.idServiFK = servicio.id_servi
        ");

        $sql->execute();
        $citas = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Crear una respuesta JSON con la lista de citas
        $response = json_encode($citas);

        // Devolver la respuesta con cabeceras CORS para permitir el acceso desde cualquier origen
        header("HTTP/1.1 200 OK");
        header("Access-Control-Allow-Origin: *"); // Permitir acceso desde cualquier origen
        header("Content-Type: application/json");
        echo $response;
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(array("error" => $e->getMessage()));
    }
}
?>
