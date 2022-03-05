<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container-xxl text-center">
    <label for="inputAsunto" class="form-label lead fw-bold" style="font-size:25px; font-family: 'Open Sans', sans-serif;">Acta N°<?php echo $alm->idacta; ?></label>
</div>
<div class="container-xxl">
<table class="table table-bordered" style="font-family: 'Open Sans', sans-serif;">
    <tr>
        <td scope="col" colspan="2">Asunto: <?php echo $alm->asunto; ?></th>
    </tr>
    <tr>
        <td scope="col">Fecha: <?php echo $alm->fecha; ?></th>
    </tr>
    <tr>
        <td scope="col">Id. Responsable: <?php echo $alm->idresponsable; ?></th>
    </tr>
</table>
</div>
<br>
<div class="container-xxl" style="font-family: 'Open Sans', sans-serif;">
    <div class="col-md-12">
        <label class="form-label fw-bold">Participantes</label>
        <hr>
    </div>
    <br>
    <form action="?c=acta&a=guardarParticipante" method="post" class="row g-3 justify-content-md-end">
        <div class="col-md-12">
            <input type="hidden" name="acta" class="form-control" id="inputId" value="<?php echo $alm->idacta; ?>">
        </div>
        <div class="col-md-4">
            <select id="inputParticipante" name="participante" class="form-select">
                <option selected disabled>Seleccione otro participante</option>
                <?php foreach($this->model->cargarUsuariosNoElegidos($alm->idacta) as $r) : ?>
                <option value="<?php echo $r->idusuario ?>"><?php echo $r->idusuario . ' - ' . $r->nombre . ' ' . $r->apellido ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="d-grid gap-2 col-md-2">
            <button type="submit" class="btn btn-success fw-bold" name="btnGuardar">Agregar</button>
        </div>
    </form>
    <br>
    <table class="table table-sm">
        <thead>
            <tr class="text-center">
                <th scope="col">IDENTIFICACION</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">TELÉFONO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">CARGO</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->model->listarParticipantes($alm->idacta) as $r) : ?>
            <tr class="text-center">
                <td><?php echo $r->idusuario; ?></td>
                <td><?php echo $r->nombre . " " . $r->apellido; ?></td>
                <td><?php echo $r->telefono; ?></td>
                <td><?php echo $r->email; ?></td>
                <td><?php echo $r->titulo; ?></td>
                <td><a href="?c=acta&a=eliminarParticipante&id=<?php echo $r->id; ?>&id2=<?php echo $alm->idacta; ?>"><img src="img/delete_black_24dp.svg"></a></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<br>
<br>
<div class="container-xxl" style="font-family: 'Open Sans', sans-serif;">
    <div class="col-md-12">
        <label class="form-label fw-bold">Compromisos</label>
        <hr>
    </div>
    <form action="?c=acta&a=guardarCompromiso" method="post" class="row g-3 justify-content-md-end">
        <div class="col-md-12">
            <input type="hidden" name="acta" class="form-control" id="inputId" value="<?php echo $alm->idacta; ?>">
        </div>
        <div class="col-md-12">
            <label for="inputDescripcion" class="form-label">Agregar compromiso</label>
            <textarea type="text" name="descripcion" class="form-control" id="inputDescripcion"
            cols="30" rows="2" maxlength="300" placeholder="Ingrese la respectiva descripcion" value="<?php echo $alm->descripcion; ?>"></textarea>
        </div>
        <div class="d-grid gap-2 col-md-2">
            <button type="submit" class="btn btn-success fw-bold" name="btnGuardar">Agregar</button>
        </div>
    </form>
    <br>
    <table class="table table-sm">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">DESCRIPCIÓN</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->model->listarCompromisos($alm->idacta) as $r) : ?>
            <tr class="text-center">
                <td><?php echo $r->idcompromiso; ?></td>
                <td><?php echo $r->descripcion; ?></td>
                <td><a href="?c=acta&a=eliminarCompromiso&id=<?php echo $r->idcompromiso; ?>&id2=<?php echo $alm->idacta; ?>"><img src="img/delete_black_24dp.svg"></a></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<br>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>