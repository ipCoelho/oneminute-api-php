<?php
    class UsuarioController {
        private $_metodo;
        private $_modelUsuario;
        private $_idusuario;

        public function __construct($modelUsuario) {
            $json = file_get_contents("php://input");
            $dadosUsuario = json_decode($json);

            $this->_modelUsuario = $modelUsuario;
            $this->_metodo = $_SERVER['REQUEST_METHOD'];
            $this->_idusuario = $dadosUsuario->idusuario ?? null;
        }

        function router() {
            switch ($this->_metodo) {
                case 'POST':
                    return $this->_modelUsuario->create();
                break;

                case 'GET':
                    if ($this->_idusuario != null || $this->_idusuario != 0) {
                        return $this->_modelUsuario->readID();
                    } 
                    else {
                        return $this->_modelUsuario->read();
                    }
                break;
                        
                case 'PUT':
                    return $this->_modelUsuario->update();
                break;
    
                case 'DELETE':
                    return $this->_modelUsuario->delete();
                break;
                        
                default: 
                    return "ERROR_NO_RESQUEST_METHOD";
                break;
            }
        }










    }
?>