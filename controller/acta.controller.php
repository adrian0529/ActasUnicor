<?php
include_once 'model/acta.php';
class actaController{

    public $model;

    public function __construct(){
        $this->model = new acta();
    }

    public function index(){
        include_once 'view/acta/index.php';
    }

    public function nuevo(){
        include_once 'view/acta/save.php';
    }

    public function guardar(){
        $alm = new acta();
        $alm->asunto = $_POST['asunto'];
        $alm->fecha = $_POST['fecha'];
        $alm->idresponsable = $_POST['responsable'];
        $alm->idprograma = $_POST['programa'];

        $this->model->registrar($alm);
        header('Location: index.php?c=acta');
    }

    public function viewEdit(){
        $alm = new acta();
        if(isset($_REQUEST['id'])){
            $alm = $this->model->cargarId($_REQUEST['id']);
        }
        include_once 'view/acta/edit.php';
    }

    public function actualizar(){
        $alm = new acta();
        $alm->idacta = $_POST['id'];
        $alm->asunto = $_POST['asunto'];
        $alm->fecha = $_POST['fecha'];
        $alm->idresponsable = $_POST['responsable'];
        $alm->idprograma = $_POST['programa'];

        $this->model->editar($alm);
        header('Location: index.php?c=acta');
    }

    public function eliminar(){

        $this->model->borrar($_REQUEST['id']);
        header('Location: index.php?c=acta');
    }

    public function viewShow(){
        $alm = new acta();
        if(isset($_REQUEST['id'])){
            $alm = $this->model->cargarId($_REQUEST['id']);
        }
        include_once 'view/acta/show.php';
    }

    public function guardarParticipante(){
        $alm = new acta();
        $alm->idparticipante = $_POST['participante'];
        $alm->idacta = $_POST['acta'];

        $this->model->registrarParticipante($alm);
        
        if(isset($_POST['acta'])){
            $alm = $this->model->cargarId($_POST['acta']);
        }
        include_once 'view/acta/show.php';
    }

    public function eliminarParticipante(){
        $alm = new acta();
        $this->model->borrarParticipante($_REQUEST['id']);

        if(isset($_REQUEST['id2'])){
            $alm = $this->model->cargarId($_REQUEST['id2']);
        }
        include_once 'view/acta/show.php';
    }

    public function guardarCompromiso(){
        $alm = new acta();
        $alm->descripcion = $_POST['descripcion'];
        $alm->idacta = $_POST['acta'];

        $this->model->registrarCompromisos($alm);
        
        if(isset($_POST['acta'])){
            $alm = $this->model->cargarId($_POST['acta']);
        }
        include_once 'view/acta/show.php';
    }

    public function eliminarCompromiso(){
        $alm = new acta();
        $this->model->borrarCompromiso($_REQUEST['id']);

        if(isset($_REQUEST['id2'])){
            $alm = $this->model->cargarId($_REQUEST['id2']);
        }
        include_once 'view/acta/show.php';
    }
}
?>