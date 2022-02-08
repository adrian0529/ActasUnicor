<?php

$conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');

$sentencia = $conexion->prepare("DELETE FROM participantes WHERE idparticipante = :idparticipante");
$sentencia->bindParam(':idparticipante', $param);

$param = $_POST['id'];

$res = $sentencia->execute();

if (!$res){
    echo "Error al ejecutar la consulta";
    exit;
}

/**if($res->rowCount() > 0)
{
$count = $res -> rowCount();
echo "<div class='content alert alert-primary' > 

Gracias: $count registro ha sido eliminado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";

print_r($res->errorInfo()); 
}
*/

echo "Los datos se guardaron satisfactoriamente";
echo "<script>location.href='listar.php'</script>";
?>