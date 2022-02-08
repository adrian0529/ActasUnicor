<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistentes</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../img/pix_black_24dp.svg">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/jquery-3.6.0.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../img/pix_white_24dp.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      ActasUnicor
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../participante/listar.php">Asistentes</a>
        <a class="nav-link" href="../reunion/listar.php">Reuniones</a>
        <a class="nav-link" href="#">Cargos</a>
      </div>
    </div>
  </div>
</nav>

<?php
echo "<h1>Lista de asistentes</h1>";
?>

<div class="container-xxl">
<form action="buscar.php" method="post" class="row g-3 lead">
            <div class="col-md-6">
              <input type="text" name="id" class="form-control" placeholder="Ingrese la identificación">
            </div>
            <div class="d-grid gap-2 col-1">
              <button type="submit" class="btn btn-outline-secondary fw-bold">Buscar</button>
            </div>
</form>
<br>
<table class="table">
  <thead class="table-dark">
    <tr class="text-center">
      <th scope="col">IDENTIFICACIÓN</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">TELÉFONO</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ID CARGO</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    try {
        $conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');
        $sql = "SELECT * FROM participantes";
        $res = $conexion->query($sql);
        foreach($res as $fila) {?>
            <tr class="text-center">
            <td><?php echo $fila['idparticipante']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['apellido']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['email']; ?></td>
            <td><?php echo $fila['idcargo']; ?></td>
            <td><a href="" data-bs-toggle="modal" data-bs-target="#editParticipante<?php echo $fila['idparticipante']; ?>"><img src="../img/edit_black_24dp.svg"></a></td>
            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteParticipante<?php echo $fila['idparticipante']; ?>"><img src="../img/delete_black_24dp.svg"></a></td>
            </tr>

            <?php 
            include('modal-eliminar.php');
            include('form-actualizar.php');   
        }
        $conexion = null;
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>

  </tbody>
</table>
</div>
</body>
</html>