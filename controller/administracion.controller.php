<?php
include_once 'model/administracion.php';
class administracionController{

    public $model;

    public function __construct(){
        $this->model = new administracion();
    }

    public function index(){
        include_once 'view/administracion/index.php';
    }
}
?>