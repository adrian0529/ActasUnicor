<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-success text-center shadow">
                <h4>Agregar nuevo usuario</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <form action="?c=usuario&a=guardar" method="post" class="row g-3 lead" id="formulario">
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
            <label for="inputTelefono" class="form-label">Teléfono</label>
            <input type="number" name="telefono" class="form-control" id="inputTelefono">
        </div>
        <div class="col-md-12">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail">
        </div>
        <div class="col-md-12">
            <label for="inputCargo" class="form-label">Cargo</label>
            <select id="inputCargo" name="cargo" class="form-select">
                <option selected disabled>Seleccione</option>
                <?php foreach($this->model->cargarCargos() as $r) : ?>
                <option value="<?php echo $r->idcargo ?>"><?php echo $r->idcargo . ' - ' . $r->titulo ?></option>
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