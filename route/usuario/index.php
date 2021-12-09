<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");
    header("Content-Type: application/json");

    include("../controller/usuarioController.php");
    include("../model/Usuario.php");
    include("../Connection.php");

    $conexao = new Connection();
    $modelUsuario = new Usuario($conexao->conectar());
    $controller = new UsuarioController($modelUsuario);

    $dbResponse = $controller->router();

    switch ($dbResponse) {
        case true:
            http_response_code(200);
            $dbReponse = array("Response: " => "Success");
        break;
        
        case false:
            http_response_code(200);
            $dbReponse = array("Response: " => "Error");
        break;
        
        case !is_bool($dbReponse):
            http_response_code(200);
            $dbReponse = array($dbReponse);
        break;
    }

    echo(json_encode($dbReponse));
?>