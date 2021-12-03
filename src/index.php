<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");
    header("Content-Type: application/json");

    include("./controller/usuarioController.php");
    include("./model/Usuario.php");
    include("./Connection.php");

    $conexao = new Connection();
    $modelUsuario = new Usuario($conexao->conectar());
    $controller = new UsuarioController($modelUsuario);

    $resposta = $controller->router();
    $resposta = array(
        "status" => 200,
        "dbResponse" => $resposta
    );

    echo(
        json_encode($resposta)
    );
?>