<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container" style="font-family: 'Open Sans', sans-serif;">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-success text-center shadow">
                <h4>Agregar nueva acta</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container" style="font-family: 'Open Sans', sans-serif;">
    <form action="?c=acta&a=guardar" method="post" class="row g-3 lead" id="formulario">
        <div class="col-md-12">
            <label for="inputAsunto" class="form-label">Asunto</label>
            <input type="text" name="asunto" class="form-control" id="inputAsunto">
        </div>
        <div class="col-md-12">
            <label for="inputFecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" id="inputFecha">
        </div>
        <div class="col-md-12">
            <label for="inputResponsable" class="form-label">Responsable</label>
            <select id="inputResponsable" name="responsable" class="form-select">
                <option selected disabled>Seleccione</option>
                <?php foreach($this->model->cargarUsuarios() as $r) : ?>
                <option value="<?php echo $r->idusuario ?>"><?php echo $r->idusuario . ' - ' . $r->nombre . ' ' . $r->apellido ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-12">
            <label for="inputPrograma" class="form-label">Programa</label>
            <select id="inputPrograma" name="programa" class="form-select">
                <option selected disabled>Seleccione</option>
                <?php foreach($this->model->cargarProgramas() as $r) : ?>
                <option value="<?php echo $r->idprograma ?>"><?php echo $r->idprograma . ' - ' . $r->titulo ?></option>
                <?php endforeach; ?>
            </select>
        </div>      
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-success fw-bold" name="btnGuardar">Agregar</button>
        </div>
    </form>
</div>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>