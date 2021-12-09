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
            $sql = "INSERT INTO tblusuario (nome, senha, email, dataNascimento) VALUES (?, ?, ?, ?);";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindvalue(1, $this->_nome);
            $declaracao->bindValue(2, $this->_senha);
            $declaracao->bindValue(3, $this->_email);
            $declaracao->bindValue(4, $this->_dataNascimento);
            
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
            $sql = "SELECT * FROM tblusuario WHERE idUsuario = ?;";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindValue(1, $this->_idusuario);
            $declaracao->execute();

            return $declaracao->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function update() {
            $sql = "UPDATE tblusuario SET nome = ?, senha = ?, email = ?, dataNascimento = ? WHERE idusuario = ?;";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindvalue(1, $this->_nome);
            $declaracao->bindValue(2, $this->_senha);
            $declaracao->bindValue(3, $this->_email);
            $declaracao->bindValue(4, $this->_dataNascimento);
            $declaracao->bindValue(5, $this->_idusuario);
            
            $declaracao->execute()? true : false;
        }

        public function delete() {
            $sql = "DELETE FROM tblusuario WHERE idusuario = ?";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindValue(1, $this->_idusuario);
            
            $declaracao->execute()? true : false;
        }
    }
?>