<?php
    class UsuarioController {
        private $_metodo;
        private $_modelUsuario;
        private $_idusuario;

        public function __construct($modelUsuario) {
            $json = file_get_contents("php://input");
            $dadosUsuario = json_decode($json, true);

            $this->_modelUsuario = $modelUsuario;
            $this->metodo = $_REQUEST['REQUEST_METHOD'];
            $this->_idusuario = $dadosUsuario->idusuario ?? null;
        }

        function router() {
            switch ($this->_metodo) {
                case 'POST':
                    return $this->modelUsuario->create();
                break;

                case 'GET':
                    if (isset($this->_idusuario)) {
                        return $this->modelUsuario->readID();
                    } 
                    else {
                        return $this->modelUsuario->read();
                    }
                break;
                        
                case 'PUT':
                    return $this->modelUsuario->update();
                break;
    
                case 'DELETE':
                    return $this->modelUsuario->delete();
                break;
                        
                default: break;
            }
        }










    }
?>