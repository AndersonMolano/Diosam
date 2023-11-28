<?php
include "../Config/config.php";
include "../Config/utils.php";


$dbConn =  connect($db);

//CONSULTAR 
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id_user']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM usuario where id_user=:id_user");
      $sql->bindValue(':id_user', $_GET['id_user']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM usuario");
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

 
    if (!empty($input) && !empty($input['name_user'])) {
        $name_user = $input['name_user'];
        $lastname_user = $input['lastname_user'];
        $email_user = $input['email_user'];
        $password_user = $input['password_user'];
        $role_user = $input['role_user'];
        $state_user = $input['state_user'];

      
        $sql = "INSERT INTO usuario
                (name_user, lastname_user, email_user, password_user, role_user, state_user)
                VALUES 
                (:name_user, :lastname_user, :email_user, :password_user, :role_user, :state_user)";
        $statement = $dbConn->prepare($sql);
        $statement->bindParam(':name_user', $name_user);
        $statement->bindParam(':lastname_user', $lastname_user);
        $statement->bindParam(':email_user', $email_user);
        $statement->bindParam(':password_user', $password_user);
        $statement->bindParam(':role_user', $role_user);
        $statement->bindParam(':state_user', $state_user);

 
        $statement->execute();
        $id_user = $dbConn->lastInsertId();

        if ($id_user) {
           
            $user = [
                'id_user' => $id_user,
                'name_user' => $name_user,
                'lastname_user' => $lastname_user,
                'email_user' => $email_user,
                'role_user' => $role_user,
                'state_user' => $state_user,
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
    $statement = $dbConn->prepare("DELETE FROM usuario where id_user=:id_user");
    $statement->bindValue(':id_user', $id);  // Usar ':id_user' como marcador de posición
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
 
    $input = json_decode(file_get_contents('php://input'), true);

 
    if (!empty($input)) {
        $id_user = $input['id_user'];
        $fields = $input;

        
        unset($fields['id_user']);

        $updateFields = '';
        foreach ($fields as $key => $value) {
            $updateFields .= "$key=:$key, ";
        }
        $updateFields = rtrim($updateFields, ', ');

        $sql = "
              UPDATE usuario
              SET $updateFields
              WHERE id_user = :id_user
               ";

        $statement = $dbConn->prepare($sql);
        $statement->bindValue(':id_user', $id_user);
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