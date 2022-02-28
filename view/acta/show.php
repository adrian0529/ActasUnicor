<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container-xxl text-center">
    <label for="inputAsunto" class="form-label lead fw-bold" style="font-size:25px">Acta N°<?php echo $alm->idacta; ?></label>
</div>
<div class="container-xxl">
<table class="table table-bordered lead">
    <tr>
        <td scope="col" colspan="2">Asunto: <?php echo $alm->asunto; ?></th>
    </tr>
    <tr>
        <td scope="col">Fecha: <?php echo $alm->fecha; ?></th>
        <td scope="col">Id. Responsable: <?php echo $alm->idresponsable; ?></th>
    </tr>
</table>
</div>
<br>
<div class="container-xxl">
    <div class="col-md-12">
        <label class="form-label fw-bold">Participantes</label>
        <hr>
    </div>
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
            <?php foreach($this->model->listarParticipantes() as $r) : ?>
            <tr class="text-center">
                <td><?php echo $r->idusuario; ?></td>
                <td><?php echo $r->nombre . " " . $r->apellido; ?></td>
                <td><?php echo $r->telefono; ?></td>
                <td><?php echo $r->email; ?></td>
                <td><?php echo $r->titulo; ?></td>
                <td><a href="?c=eliminar&id=<?php echo $r->idacta; ?>"><img src="img/delete_black_24dp.svg"></a></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>