<?php

    class ModelPessoa{

        private $_conn;
        private $_codPessoa;
        private $_nome;
        private $_email;
        private $_dataNascimento;
        private $_senha;

        public function __construct($conn) {

            $json = file_get_contents("php://input");
            $dadosPessoa = json_decode($json);

            $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;
            $this->_nome = $dadosPessoa->nome ?? null;
            $this->_email = $dadosPessoa->email ?? null;
            $this->_dataNascimento = $dadosPessoa->dataNascimento ?? null;
            $this->_senha = $dadosPessoa->senha ?? null;

            $this->_conn = $conn;

        }

        public function create() {

            $sql = "INSERT INTO tblusuario 
                                (nome, email, dataNascimento, senha)
                    VALUES (?, ?, ?, ?)";

            $stm = $this->_conn->prepare($sql);

            $stm->bindValue(1, $this->_nome);
            $stm->bindValue(2, $this->_email);
            $stm->bindValue(3, $this->_dataNascimento);
            $stm->bindValue(4, $this->_senha);

            if ($stm->execute()) {
                return "Success";
            } else {
                return "Error";
            }

        }

    }

?>