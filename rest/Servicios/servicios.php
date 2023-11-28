<?php
include "../Config/config.php";
include "../Config/utils.php";


$dbConn =  connect($db);

//CONSULTAR 
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id_servi']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM servicio where id_servi=:id_servi");
      $sql->bindValue(':id_servi', $_GET['id_servi']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM servicio");
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

 
    if (!empty($input) && !empty($input['price_servi'])) {
        $price_servi = $input['price_servi'];
        $type_servi = $input['type_servi'];
        $descrip_servi = $input['descrip_servi'];
      

      
        $sql = "INSERT INTO servicio
                (price_servi, type_servi, descrip_servi)
                VALUES 
                (:price_servi, :type_servi, :descrip_servi)";
        $statement = $dbConn->prepare($sql);
        $statement->bindParam(':price_servi', $price_servi);
        $statement->bindParam(':type_servi', $type_servi);
        $statement->bindParam(':descrip_servi', $descrip_servi);
      

 
        $statement->execute();
        $id_servi = $dbConn->lastInsertId();

        if ($id_servi) {
           
            $user = [
                'id_servi' => $id_servi,
                'price_servi' => $price_servi,
                'type_servi' => $type_servi,
                'descrip_servi' => $descrip_servi
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
    $statement = $dbConn->prepare("DELETE FROM servicio where id_servi=:id_servi");
    $statement->bindValue(':id_servi', $id);  // Usar ':id_user' como marcador de posición
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
 
    $input = json_decode(file_get_contents('php://input'), true);

 
    if (!empty($input)) {
        $id_servi = $input['id_servi'];
        $fields = $input;

        
        unset($fields['id_servi']);

        $updateFields = '';
        foreach ($fields as $key => $value) {
            $updateFields .= "$key=:$key, ";
        }
        $updateFields = rtrim($updateFields, ', ');

        $sql = "
              UPDATE servicio
              SET $updateFields
              WHERE id_servi = :id_servi
               ";

        $statement = $dbConn->prepare($sql);
        $statement->bindValue(':id_servi', $id_servi);
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

header("HTTP/1.1 400 Bad Request");

?>