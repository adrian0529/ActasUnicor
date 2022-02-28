<?php
class usuario{

    public $cnx;
    public $idusuario;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $idcargo;

    public function __construct(){
        try {
            $this->cnx = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar(){
        try {
            $query = "SELECT * FROM usuarios";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cargarCargos(){
        try {
            $query = "SELECT * FROM cargos";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(usuario $data){
        try {
            $query = "INSERT INTO usuarios (idusuario, nombre, apellido, telefono, email, idcargo) VALUES (?,?,?,?,?,?)";
            $this->cnx->prepare($query)->execute(array($data->idusuario, $data->nombre, $data->apellido, $data->telefono, $data->email, $data->idcargo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cargarId($id){
        try {
            $query = "SELECT * FROM usuarios WHERE idusuario = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editar($data){
        try {
            $query = "UPDATE usuarios SET nombre=?, apellido=?, telefono=?, email=?, idcargo=? WHERE idusuario=?";
            $this->cnx->prepare($query)->execute(array($data->nombre, $data->apellido, $data->telefono, $data->email, $data->idcargo, $data->idusuario));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrar($id){
        try {
            $query = "DELETE FROM usuarios WHERE idusuario = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>