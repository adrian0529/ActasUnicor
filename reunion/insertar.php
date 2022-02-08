<?php

$conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');

$sentencia = $conexion->prepare("INSERT INTO reuniones (idreunion, tema, fecha, lugar, idorganizador, hora_inicio, hora_fin) VALUES (null, :tema, :fecha, :lugar, :idorganizador, :hora_inicio, :hora_fin)");
$sentencia->bindParam(':tema', $param1);
$sentencia->bindParam(':fecha', $param2);
$sentencia->bindParam(':lugar', $param3);
$sentencia->bindParam(':idorganizador', $param4);
$sentencia->bindParam(':hora_inicio', $param5);
$sentencia->bindParam(':hora_fin', $param6);

$param1 = $_POST['tema'];
$param2 = $_POST['fecha'];
$param3 = $_POST['lugar'];
$param4 = $_POST['organizador'];
$param5 = $_POST['horaInicio'];
$param6 = $_POST['horaFin'];

$res = $sentencia->execute();

if (!$res){
    echo "Error al ejecutar la consulta";
    exit;
}

//echo "Los datos se guardaron satisfactoriamente";
echo "<script>location.href='listar.php'</script>";
?>