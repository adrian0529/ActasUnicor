<?php
class programa{

    public $cnx;
    public $idprograma;
    public $titulo;

    public function __construct(){
        try {
            $this->cnx = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar(){
        try {
            $query = "SELECT * FROM programas";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(programa $data){
        try {
            $query = "INSERT INTO programas (titulo) VALUES (?)";
            $this->cnx->prepare($query)->execute(array($data->titulo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cargarId($id){
        try {
            $query = "SELECT * FROM programas WHERE idprograma = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editar($data){
        try {
            $query = "UPDATE programas SET titulo=? WHERE idprograma=?";
            $this->cnx->prepare($query)->execute(array($data->titulo, $data->idprograma));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrar($id){
        try {
            $query = "DELETE FROM programas WHERE idprograma = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>