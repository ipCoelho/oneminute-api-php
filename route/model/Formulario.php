<?php
    class Formulario {
        private $_idusuario;
        private $_comentario;
        private $_vacina;
        private $_nota;
        
        public function __construct($conexao) {
            $json = file_get_contents("php://input");
            $dadosUsuario = json_decode($json);

            $this->_idusuario = $dadosUsuario->idusuario ?? null;
            $this->_comentario = $dadosUsuario->comentario ?? null;
            $this->_vacina = $dadosUsuario->vacina ?? null;
            $this->_nota = $dadosUsuario->nota ?? null;

            $this->_conexao = $conexao;
        }

        public function create() {
            $sql = "INSERT INTO tblformulario (idUsuario, comentario, vacina, nota) VALUES (?, ?, ?, ?);";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindvalue(1, $this->_idusuario);
            $declaracao->bindValue(2, $this->_comentario);
            $declaracao->bindValue(3, $this->_vacina);
            $declaracao->bindValue(4, $this->_nota);
            
            return $declaracao->execute();
        }

        public function read() {
            $sql = "SELECT * FROM tblformulario;";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->execute();

            return $declaracao->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function readID() {
            $sql = "SELECT * FROM tblformulario WHERE idusuario = ?;";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindValue(1, $this->_idusuario);
            $declaracao->execute();

            return $declaracao->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function update() {
            $sql = "UPDATE tblusuario SET nome = ?, senha = ?, email = ?, dataNascimento = ? WHERE idusuario = ?;";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindvalue(1, $this->_comentario);
            $declaracao->bindValue(2, $this->_nota);
            $declaracao->bindValue(3, $this->_email);
            $declaracao->bindValue(4, $this->_dataNascimento);
            $declaracao->bindValue(5, $this->_idusuario);
            
            return $declaracao->execute();
        }

        public function delete() {
            $sql = "DELETE FROM tblusuario WHERE idusuario = ?";
            $declaracao = $this->_conexao->prepare($sql);
            $declaracao->bindValue(1, $this->_idusuario);
            
            return $declaracao->execute();
        }
    }
?>