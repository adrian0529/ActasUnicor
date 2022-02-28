<?php
class administracion{

    public function __construct(){
        try {
            $this->cnx = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>