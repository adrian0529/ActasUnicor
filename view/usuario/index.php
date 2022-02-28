<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-success text-center shadow">
                <h3>Lista de usuarios</h3>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-xxl">
    <form action="buscar.php" method="post" class="row g-3 lead">
        <div class="col-md-6">
            <input type="text" name="id" class="form-control" placeholder="Ingrese la identificación">
        </div>
        <div class="d-grid gap-2 col-1">
            <button type="submit" class="btn btn-outline-secondary fw-bold">Buscar</button>
        </div>
    </form>
</div>
<div class=" container-xxl d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="?c=nuevo" class="btn btn-success col-2 fw-bold"><img src="img/add_circle_white_24dp.svg"> Nuevo</a>
</div>
<br>
<div class="container-xxl">
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
            <?php foreach($this->model->listar() as $r) : ?>
            <tr class="text-center">
                <td><?php echo $r->idusuario; ?></td>
                <td><?php echo $r->nombre; ?></td>
                <td><?php echo $r->apellido; ?></td>
                <td><?php echo $r->telefono; ?></td>
                <td><?php echo $r->email; ?></td>
                <td><?php echo $r->idcargo; ?></td>
                <td><a href="?c=usuario&a=viewEdit&id=<?php echo $r->idusuario; ?>"><img src="img/edit_black_24dp.svg"></a></td>
                <td><a href="?c=usuario&a=eliminar&id=<?php echo $r->idusuario; ?>"><img src="img/delete_black_24dp.svg"></a></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>