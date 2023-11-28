<?php
include "../Config/config.php";
include "../Config/utils.php";

// Conectar a la base de datos
$dbConn = connect($db);

// Verificar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Obtener los datos del cuerpo de la solicitud
    $input = json_decode(file_get_contents('php://input'), true);

    // Verificar que los datos estén presentes
    if (!empty($input) && !empty($input['id_cita'])) {
        $id_cita = $input['id_cita'];
        $fields = $input;

        // Eliminar el campo 'id_user' para evitar actualizar el ID
        unset($fields['id_cita']);

        // Construir la consulta SQL para actualizar el usuario
        $updateFields = '';
        foreach ($fields as $key => $value) {
            $updateFields .= "$key=:$key, ";
        }
        $updateFields = rtrim($updateFields, ', ');

        $sql = "
              UPDATE cita
              SET $updateFields
              WHERE id_cita = :id_cita
               ";

        $statement = $dbConn->prepare($sql);
        $statement->bindValue(':id_cita', $id_cita);
        foreach ($fields as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        // Ejecutar la consulta
        $statement->execute();
        header("HTTP/1.1 200 OK");
        echo json_encode(array("message" => "Usuario actualizado con éxito"));
        exit();
    } else {
        // Datos de solicitud PUT vacíos o sin 'id_user'
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("error" => "Datos de usuario incompletos"));
        exit();
    }
} else {
    // Método de solicitud no admitido
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(array("error" => "Método no permitido"));
    exit();
}
?>
