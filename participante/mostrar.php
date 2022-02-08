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
    <title>Asistentes</title>
</head>
<body>
<?php
$parametro = $_GET['idparticipante'];

if (!filter_var($parametro, FILTER_VALIDATE_INT)){
    echo "El parámetro idparticipante no es numérico";
    exit;
}

 $conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');
 $sql = "SELECT * FROM participantes WHERE idparticipante = " . $parametro;
 $res = $conexion->query($sql);

 ?>

<div class="container-xxl">
<table class="table">
  <thead class="table-dark">
    <tr class="text-center">
      <th scope="col">IDENTIFICACIÓN</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">TELÉFONO</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ID CARGO</th>
    </tr>
  </thead>
  <tbody>
  <?php
        foreach($res as $fila) {
            echo "<tr class=\"text-center\">";
            echo "<td>" . $fila['idparticipante'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['apellido'] . "</td>";
            echo "<td>" . $fila['telefono'] . "</td>";
            echo "<td>" . $fila['email'] . "</td>";
            echo "<td>" . $fila['idcargo'] . "</td>";
            echo "</tr>";
        }
        $conexion = null;
    ?>
  </tbody>
</table>
</div>
</body>
</html>