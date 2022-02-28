<?php
class cargo{

    public $cnx;
    public $idcargo;
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
            $query = "SELECT * FROM cargos";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(cargo $data){
        try {
            $query = "INSERT INTO cargos (titulo) VALUES (?)";
            $this->cnx->prepare($query)->execute(array($data->titulo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cargarId($id){
        try {
            $query = "SELECT * FROM cargos WHERE idcargo = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editar($data){
        try {
            $query = "UPDATE cargos SET titulo=? WHERE idcargo=?";
            $this->cnx->prepare($query)->execute(array($data->titulo, $data->idcargo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrar($id){
        try {
            $query = "DELETE FROM cargos WHERE idcargo = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>