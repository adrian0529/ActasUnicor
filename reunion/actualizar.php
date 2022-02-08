<?php

$conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');

$sentencia = $conexion->prepare("UPDATE reuniones SET tema = :tema, fecha = :fecha, lugar = :lugar, hora_inicio = :hora_inicio, hora_fin = :hora_fin, idorganizador = :idorganizador WHERE idreunion = :idreunion");
$sentencia->bindParam(':idreunion', $param1);
$sentencia->bindParam(':tema', $param2);
$sentencia->bindParam(':fecha', $param3);
$sentencia->bindParam(':lugar', $param4);
$sentencia->bindParam(':idorganizador', $param5);
$sentencia->bindParam(':hora_inicio', $param6);
$sentencia->bindParam(':hora_fin', $param7);

$param1 = $_POST['idReunion'];
$param2 = $_POST['tema'];
$param3 = $_POST['fecha'];
$param4 = $_POST['lugar'];
$param5 = $_POST['organizador'];
$param6 = $_POST['horaInicio'];
$param7 = $_POST['horaFin'];

$res = $sentencia->execute();

if (!$res){
    echo "Error al ejecutar la consulta";
    exit;
}

//echo "Los datos se guardaron satisfactoriamente";
echo "<script>location.href='listar.php'</script>";
?>