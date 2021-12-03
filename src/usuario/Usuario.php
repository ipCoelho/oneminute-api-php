<?php
    class Usuario {
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
            $this->_senha = $dadosUsuario->senha ?? null;
            $this->_email = $dadosUsuario->email ?? null;
            $this->_dataNascimento = $dadosUsuario->dataNascimento ?? null;
            $this->_conexao = $conexao;
        }

        public function create() {
            $sql = "INSERT INTO tblusuario (nome, email, dataNascimento, senha) VALUES (?, ?, ?, ?);";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindParam(1, $this->_)

            if ( $declaracao->execute() ) {
                return "Success";
            } else {
                return "Error";
            }
        }

        public function read() {
            $sql = "SELECT * FROM tblusuario;";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->execute();

            return $declaracao->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function readID() {
            $sql = "SELECT * FROM tblusuario WHERE idusuario = $this->_idusuario;";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->execute();

            return $declaracao->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function update() {
            $sql = "UPDATE tblusuario SET 
                nome = $this->_nome,
                senha = $this->_senha,
                email = $this->_email,
                dataNascimento = $this->dataNascimento
                WHERE idusuario = $this->_idusuario
            ;";
            $declaracao = $this->_conexao->prepare($sql);
            
            if ( $declaracao->execute() ) {
                return "Success";
            } else {
                return "Error";
            }
        }

        public function delete() {
            $sql = "DELETE FROM tblusuario WHERE idusuario = $this->idusuario";
            $declaracao = $this->_conexao->prepare($sql);
            
            if ( $declaracao->execute() ) {
                return "Success";
            } else {
                return "Error";
            }
        }
    }
?>