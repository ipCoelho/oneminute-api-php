<?php
    class Usuario{
        private $_idusuario;
        private $_nome;
        private $_senha;
        private $_email;
        private $_dataNascimento;
        private $_conexao;
        
        public function __construct($conexao) {
            $json = file_get_contents("php://input");
            $dadosUsuario = json_decode($json);

            $this->_idusuario = $dadosUsuario->idusuario ?? null;
            $this->_nome = $dadosUsuario->nome ?? null;
            $this->_email = $dadosUsuario->email ?? null;
            $this->_dataNascimento = $dadosUsuario->dataNascimento ?? null;
            $this->_senha = $dadosUsuario->senha ?? null;
            $this->_conexao = $conexao;
        }

        public function create() {
            $sql = "INSERT INTO tblusuario (nome, email, dataNascimento, senha) 
                VALUES (
                    $this->_nome,
                    $this->_email,
                    $this->_dataNascimento,
                    $this->_senha
                );"
            ;
            $declaracao = $this->_conexao->prepare($sql);

            if ( $declaracao->execute() ) {
                return "Success";
            } else {
                return "Error";
            }
        }

        public function read() {
            $sql = "SELECT * FROM tblusuario;";
            $declaracao = $this->_conexao->prepare($sql);

            if ( $declaracao->execute() ) {
                return "Success";
            } else {
                return "Error";
            } 
        }
    }
?>