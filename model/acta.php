<?php
class acta{

    public $cnx;
    public $idacta;
    public $asunto;
    public $fecha;
    public $idresponsable;
    public $idprograma;
    public $idusuario;
    public $nombre;
    public $apellido;
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
            $query = "SELECT a.idacta, a.asunto, a.fecha, a.idresponsable, p.titulo FROM actas a INNER JOIN programas p ON a.idprograma=p.idprograma";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cargarUsuarios(){
        try {
            $query = "SELECT * FROM usuarios";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cargarProgramas(){
        try {
            $query = "SELECT * FROM programas";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(acta $data){
        try {
            $query = "INSERT INTO actas (asunto, fecha, idresponsable, idprograma) VALUES (?,?,?,?)";
            $this->cnx->prepare($query)->execute(array($data->asunto, $data->fecha, $data->idresponsable, $data->idprograma));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cargarId($id){
        try {
            $query = "SELECT * FROM actas WHERE idacta = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editar($data){
        try {
            $query = "UPDATE actas SET asunto=?, fecha=?, idresponsable=?, idprograma=? WHERE idacta = ?";
            $this->cnx->prepare($query)->execute(array($data->asunto, $data->fecha, $data->idresponsable, $data->idprograma, $data->idacta));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrar($id){
        try {
            $query = "DELETE FROM actas WHERE idacta = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarParticipantes($id){
        try {
            $query = "SELECT idusuario,nombre,apellido,telefono,email,titulo FROM (SELECT u.idusuario,u.nombre,u.apellido,u.telefono,u.email,c.titulo,p.idacta FROM participantes p, usuarios u, cargos c WHERE u.idusuario=p.idparticipante AND u.idcargo=c.idcargo) m WHERE m.idacta = ?";
            $stm = $this->cnx->prepare($query);
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function registrarParticipantes(acta $data){
        try {
            $query = "INSERT INTO participantes (idparticpante, idacta) VALUES (?,?)";
            $this->cnx->prepare($query)->execute(array($data->idparticipante, $data->idacta));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>