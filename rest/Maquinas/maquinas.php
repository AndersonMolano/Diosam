<?php
include "../Config/config.php";
include "../Config/utils.php";


$dbConn =  connect($db);

//CONSULTAR 
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id_machine']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM maquinas where id_machine=:id_machine");
      $sql->bindValue(':id_machine', $_GET['id_machine']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM maquinas");
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
        $id_machine = $input['data_meet'];
        $make_machine = $input['make_machine'];
        $type_machine = $input['type_machine'];
      

      
        $sql = "INSERT INTO maquinas
                (id_machine, make_machine, type_machine)
                VALUES 
                (:id_machine, :make_machine, :type_machine)";
        $statement = $dbConn->prepare($sql);
        $statement->bindParam(':id_machine', $id_machine);
        $statement->bindParam(':make_machine', $make_machine);
        $statement->bindParam(':type_machine', $type_machine);
      

 
        $statement->execute();
        $id_machine = $dbConn->lastInsertId();

        if ($id_machine) {
           
            $user = [
                'id_machine' => $id_machine,
                'make_machine' => $make_machine,
                'type_machine' => $type_machine
               
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
    $statement = $dbConn->prepare("DELETE FROM maquina where id_machine=:id_machine");
    $statement->bindValue(':id_machine', $id);  
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
 
    $input = json_decode(file_get_contents('php://input'), true);

 
    if (!empty($input)) {
        $id_machine = $input['id_machine'];
        $fields = $input;

        
        unset($fields['id_machine']);

        $updateFields = '';
        foreach ($fields as $key => $value) {
            $updateFields .= "$key=:$key, ";
        }
        $updateFields = rtrim($updateFields, ', ');

        $sql = "
              UPDATE maquinas
              SET $updateFields
              WHERE id_machine = :id_machine
               ";

        $statement = $dbConn->prepare($sql);
        $statement->bindValue(':id_machine', $id_machine);
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