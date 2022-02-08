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

<div class="modal fade" id="editParticipante<?php echo $fila['idparticipante']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="actualizar.php" method="post" class="row g-3 lead">
            <div class="col-md-12">
              <label for="inputIdentificacion" class="form-label">Identificación</label>
              <input type="number" name="identificacion" class="form-control" id="inputIdentificacion" value="<?php echo $fila['idparticipante'] ?>" readonly>
            </div>
            <div class="col-md-12">
              <label for="inputNombre" class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" id="inputNombre" value="<?php echo $fila['nombre']?>" style="text-transform:uppercase;">
            </div>
            <div class="col-md-12">
                <label for="inputApellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="inputApellido" value="<?php echo $fila['apellido']?>" style="text-transform:uppercase;">
              </div>
              <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?php echo $fila['email']?>">
              </div>
              <div class="col-md-12">
                <label for="inputIdentificacion" class="form-label">Teléfono</label>
                <input type="number" name="telefono" class="form-control" id="inputIdentificacion" value="<?php echo $fila['telefono']?>">
              </div>
            <div class="col-md-12">
              <label for="inputCargo" class="form-label">Cargo</label>
              <select id="inputCargo" name="cargo" class="form-select">
              <option disabled>Seleccione</option>
              <option value="<?php echo $fila['idcargo']?>"><?php echo $fila['idcargo']?></option>
              <?php
                $sql = "SELECT * FROM cargos";
                $res = $conexion->query($sql);
                foreach($res as $fila) {
                    echo '<option value="' . $fila["idcargo"] . '">' . $fila["idcargo"] . ' - ' . $fila["titulo"] . '</option>';
                }
                $conexion = null;
                ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success col-4">Guardar</button>
            </div>    
          </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    $('#inputCargo > option[value="<?php echo $fila['idcargo']; ?>"]').attr('selected', 'selected');
});
</script>