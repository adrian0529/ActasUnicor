<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../img/pix_black_24dp.svg">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/jquery-3.6.0.min.js"></script>
    <title>Reuniones</title>
</head>
<body>
<?php
$parametro = $_POST['id'];

if (!filter_var($parametro, FILTER_VALIDATE_INT)){
    echo "El parámetro idreunion no es numérico";
    exit;
}

 $conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');
 $sql = "SELECT * FROM reuniones WHERE idreunion = " . $parametro;
 $res = $conexion->query($sql);

 ?>

<div class="container-xxl">
<table class="table">
  <thead class="table-dark">
    <tr class="text-center">
      <th scope="col">ID REUNION</th>
      <th scope="col">TEMA</th>
      <th scope="col">FECHA</th>
      <th scope="col">LUGAR</th>
      <th scope="col">HORA INICIO</th>
      <th scope="col">HORA FIN</th>
      <th scope="col">ID ORGANIZADOR</th>
    </tr>
  </thead>
  <tbody>
  <?php
        foreach($res as $fila) {
            echo "<tr class=\"text-center\">";
            echo "<td>" . $fila['idreunion'] . "</td>";
            echo "<td>" . $fila['tema'] . "</td>";
            echo "<td>" . $fila['fecha'] . "</td>";
            echo "<td>" . $fila['lugar'] . "</td>";
            echo "<td>" . $fila['hora_inicio'] . "</td>";
            echo "<td>" . $fila['hora_fin'] . "</td>";
            echo "<td>" . $fila['idorganizador'] . "</td>";
            echo "</tr>";
        }
        $conexion = null;
    ?>
  </tbody>
</table>
</div>
</body>
</html>