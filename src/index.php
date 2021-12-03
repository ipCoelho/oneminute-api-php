<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");
    header("Content-Type: application/json");

    include("./usuario/controller.php");
    include("./usuario/Usuario.php");
    include("./Connection.php");

    $conexao = new Connection();
    $modelUsuario = new Usuario($conexao->conectar());

    $dump = var_dump($modelUsuario->create());
    echo('<pre>'.$dump.'</pre>');
?>