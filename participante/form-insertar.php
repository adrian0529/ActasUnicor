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
    <h1>FORMULARIO</h1>
    <div class="container">
        <form action="insertar.php" method="post" class="row g-3 lead">
            <div class="col-md-12">
              <label for="inputIdentificacion" class="form-label">Identificación</label>
              <input type="number" name="identificacion" class="form-control" id="inputIdentificacion" placeholder="Número de documento de identidad" 
              maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div>
            <div class="col-md-12">
              <label for="inputNombre" class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" id="inputNombre" style="text-transform:uppercase;">
            </div>
            <div class="col-md-12">
                <label for="inputApellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="inputApellido" style="text-transform:uppercase;">
              </div>
              <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4">
              </div>
              <div class="col-md-12">
                <label for="inputIdentificacion" class="form-label">Teléfono</label>
                <input type="number" name="telefono" class="form-control" id="inputIdentificacion">
              </div>
            <div class="col-md-12">
              <label for="inputCargo" class="form-label">Cargo</label>
              <select id="inputCargo" name="cargo" class="form-select">
              <option selected disabled>Seleccione</option>
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
            <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" class="btn btn-success fw-bold">Agregar</button>
            </div>
          </form>
    </div>
</body>
</html>