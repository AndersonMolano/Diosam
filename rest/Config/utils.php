<?php
// Verificar si la función connect no existe antes de declararla
if (!function_exists('connect')) {
    function connect($db)
    {
        try {
            $conn = new PDO("mysql:host={$db['host']};dbname={$db['db']}", $db['username'], $db['password']);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }
}

// Verificar si la función getParams no existe antes de declararla
if (!function_exists('getParams')) {
    // Obtener parametros para updates
    function getParams($input)
    {
        $filterParams = [];
        foreach ($input as $param => $value) {
            $filterParams[] = "$param=:$param";
        }
        return implode(", ", $filterParams);
    }
}

// Verificar si la función bindAllValues no existe antes de declararla
if (!function_exists('bindAllValues')) {
    // Asociar todos los parametros a un sql
    function bindAllValues($statement, $params)
    {
        foreach ($params as $param => $value) {
            $statement->bindValue(':' . $param, $value);
        }
        return $statement;
    }
}
?>
