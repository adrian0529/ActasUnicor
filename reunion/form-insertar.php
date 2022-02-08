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
              <label for="inputTema" class="form-label">Tema</label>
              <input type="text" name="tema" class="form-control" id="inputTema">
            </div>
            <div class="col-md-12">
                <label for="inputFecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" id="inputFecha">
              </div>
              <div class="col-md-12">
                <label for="inputLugar" class="form-label">Lugar</label>
                <input type="text" name="lugar" class="form-control" id="inputLugar">
              </div>
              <div class="col-md-12">
                <label for="inputHoraInicio" class="form-label">Hora Inicio</label>
                <input type="time" name="horaInicio" class="form-control" id="inputHoraInicio">
              </div>
              <div class="col-md-12">
                <label for="inputHoraFin" class="form-label">Hora Fin</label>
                <input type="time" name="horaFin" class="form-control" id="inputHoraFin">
              </div>
            <div class="col-md-12">
              <label for="inputOrganizador" class="form-label">Organizador</label>
              <select id="inputOrganizador" name="organizador" class="form-select">
                <option selected disabled>Seleccione</option>
                <?php
                $sql = "SELECT * FROM participantes";
                $res = $conexion->query($sql);
                foreach($res as $fila) {
                    echo '<option value="' . $fila["idparticipante"] . '">' . $fila["idparticipante"] . ' - ' . $fila["nombre"] . ' ' . $fila["apellido"] . '</option>';
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