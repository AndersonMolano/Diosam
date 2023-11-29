<?php
include "../Config/config.php";
include "../Config/utils.php";


$dbConn =  connect($db);

//CONSULTAR 
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id_cita']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM cita where id_cita=:id_cita");
      $sql->bindValue(':id_cita', $_GET['id_cita']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM cita");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
}

//CREAR
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del cuerpo de la solicitud
    $input = json_decode(file_get_contents('php://input'), true);

 
    if (!empty($input) && !empty($input['data_meet'])) {
        $data_meet = $input['data_meet'];
        $idServiFK = $input['idServiFK'];
        $idClieFK = $input['idClieFK'];
      

      
        $sql = "INSERT INTO cita
                (data_meet, idServiFK, idClieFK)
                VALUES 
                (:data_meet, :idServiFK, :idClieFK)";
        $statement = $dbConn->prepare($sql);
        $statement->bindParam(':data_meet', $data_meet);
        $statement->bindParam(':idServiFK', $idServiFK);
        $statement->bindParam(':idClieFK', $idClieFK);
      

 
        $statement->execute();
        $id_cita = $dbConn->lastInsertId();

        if ($id_cita) {
           
            $user = [
                'id_cita' => $id_cita,
                'data_meet' => $data_meet,
                'idServiFK' => $idServiFK,
                'idClieFK' => $idClieFK
,
            ];
            header("HTTP/1.1 201 Created");
            echo json_encode($user);
            exit();
        } else {
           
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(array("error" => "Error al crear el usuario"));
            exit();
        }
    } else {
      
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("error" => "name_user is required"));
        exit();
    }
}


// Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $id = $_GET['id'];
    $statement = $dbConn->prepare("DELETE FROM cita where id_cita=:id_cita");
    $statement->bindValue(':id_cita', $id);  
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
 
    $input = json_decode(file_get_contents('php://input'), true);

 
    if (!empty($input)) {
        $id_cita = $input['id_cita'];
        $fields = $input;

        
        unset($fields['id_cita']);

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

        $statement->execute();
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        
        header("HTTP/1.1 400 Bad Request");
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        // Consulta todas las citas con información de usuario y servicio
        $sql = $dbConn->prepare("SELECT cita.*, usuario.name_user as nombreUsuario, servicio.type_servi as nombreServicio
            FROM cita
            LEFT JOIN usuario ON cita.idClieFK = usuario.id_user
            LEFT JOIN servicio ON cita.idServiFK = servicio.id_servi");
        
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


header("HTTP/1.1 400 Bad Request");

?>