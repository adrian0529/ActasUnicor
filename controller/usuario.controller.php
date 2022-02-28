<?php
include_once 'model/usuario.php';
class usuarioController{

    public $model;

    public function __construct(){
        $this->model = new usuario();
    }

    public function index(){
        include_once 'view/usuario/index.php';
    }

    public function nuevo(){
        include_once 'view/usuario/save.php';
    }

    public function guardar(){
        $alm = new usuario();
        $alm->idusuario = $_POST['identificacion'];
        $alm->nombre = strtoupper($_POST['nombre']);
        $alm->apellido = strtoupper($_POST['apellido']);
        $alm->telefono = $_POST['telefono'];
        $alm->email = $_POST['email'];
        $alm->idcargo = $_POST['cargo'];

        $this->model->registrar($alm);
        header('Location: index.php?c=usuario');
    }

    public function viewEdit(){
        $alm = new usuario();
        if(isset($_REQUEST['id'])){
            $alm = $this->model->cargarId($_REQUEST['id']);
        }
        include_once 'view/usuario/edit.php';
    }

    public function actualizar(){
        $alm = new usuario();
        $alm->idusuario = $_POST['identificacion'];
        $alm->nombre = strtoupper($_POST['nombre']);
        $alm->apellido = strtoupper($_POST['apellido']);
        $alm->telefono = $_POST['telefono'];
        $alm->email = $_POST['email'];
        $alm->idcargo = $_POST['cargo'];

        $this->model->editar($alm);
        header('Location: index.php?c=usuario');
    }

    public function eliminar(){

        $this->model->borrar($_REQUEST['id']);
        header('Location: index.php?c=usuario');
    }
}
?>