<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container" style="font-family: 'Open Sans', sans-serif;">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-success text-center shadow">
                <h4>Agregar nuevo programa</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container" style="font-family: 'Open Sans', sans-serif;">
    <form action="?c=programa&a=guardar" method="post" class="row g-3 lead" id="formulario">
        <div class="col-md-12">
            <label for="inputTitulo" class="form-label">Titulo</label>
            <input type="text" name="titulo" class="form-control" id="inputTitulo">
        </div>      
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-success fw-bold" name="btnGuardar">Agregar</button>
        </div>
    </form>
</div>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>