<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/pix_black_24dp.svg">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/jquery-3.6.0.min.js"></script>
    <title>Formulario</title>
</head>
<body>
<?php
    $conexion = new PDO('mysql:host=127.0.0.1:33065;dbname=actasunicor;charset=utf8', 'root', '');
?>

<div class="modal fade" id="deleteParticipante<?php echo $fila['idparticipante'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Está seguro que desea eliminar a la persona identificada con <?php echo $fila['idparticipante']; ?>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="<?php echo $fila['idparticipante'] ?>">Eliminar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>