<?php
include_once 'model/programa.php';
class programaController{

    public $model;

    public function __construct(){
        $this->model = new programa();
    }

    public function index(){
        include_once 'view/programa/index.php';
    }

    public function nuevo(){
        include_once 'view/programa/save.php';
    }

    public function guardar(){
        $alm = new programa();
        $alm->titulo = $_POST['titulo'];

        $this->model->registrar($alm);
        header('Location: index.php?c=programa');
    }

    public function viewEdit(){
        $alm = new programa();
        if(isset($_REQUEST['id'])){
            $alm = $this->model->cargarId($_REQUEST['id']);
        }
        include_once 'view/programa/edit.php';
    }

    public function actualizar(){
        $alm = new programa();
        $alm->idprograma = $_POST['id'];
        $alm->titulo = $_POST['titulo'];

        $this->model->editar($alm);
        header('Location: index.php?c=programa');
    }

    public function eliminar(){

        $this->model->borrar($_REQUEST['id']);
        header('Location: index.php?c=programa');
    }
}
?>