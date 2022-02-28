<?php
include_once 'model/cargo.php';
class cargoController{

    public $model;

    public function __construct(){
        $this->model = new cargo();
    }

    public function index(){
        include_once 'view/cargo/index.php';
    }

    public function nuevo(){
        include_once 'view/cargo/save.php';
    }

    public function guardar(){
        $alm = new cargo();
        $alm->titulo = $_POST['titulo'];

        $this->model->registrar($alm);
        header('Location: index.php?c=cargo');
    }

    public function viewEdit(){
        $alm = new cargo();
        if(isset($_REQUEST['id'])){
            $alm = $this->model->cargarId($_REQUEST['id']);
        }
        include_once 'view/cargo/edit.php';
    }

    public function actualizar(){
        $alm = new cargo();
        $alm->idcargo = $_POST['id'];
        $alm->titulo = $_POST['titulo'];

        $this->model->editar($alm);
        header('Location: index.php?c=cargo');
    }

    public function eliminar(){

        $this->model->borrar($_REQUEST['id']);
        header('Location: index.php?c=cargo');
    }
}
?>