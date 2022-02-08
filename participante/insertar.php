<?php

$conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');

$sentencia = $conexion->prepare("INSERT INTO participantes (idparticipante, nombre, apellido, telefono, email, idcargo) VALUES (:idparticipante, :nombre, :apellido, :telefono, :email, :idcargo)");
$sentencia->bindParam(':idparticipante', $param1);
$sentencia->bindParam(':nombre', $param2);
$sentencia->bindParam(':apellido', $param3);
$sentencia->bindParam(':telefono', $param4);
$sentencia->bindParam(':email', $param5);
$sentencia->bindParam(':idcargo', $param6);

$param1 = $_POST['identificacion'];
$param2 = strtoupper($_POST['nombre']);
$param3 = strtoupper($_POST['apellido']);
$param4 = $_POST['telefono'];
$param5 = $_POST['email'];
$param6 = $_POST['cargo'];

$res = $sentencia->execute();

if (!$res){
    echo "Error al ejecutar la consulta";
    exit;
}

echo "<script>location.href='listar.php'</script>";
?>