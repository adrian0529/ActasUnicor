<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center" style="color: #139511; font-family: 'Open Sans', sans-serif; font-weight: bold; font-size: 25px">
                Cargos
            </div>
        </div>
    </div>
</div>
<br>
<div class=" container-xxl d-grid gap-2 d-md-flex justify-content-md-end" style="font-family: 'Open Sans', sans-serif;">
    <a href="?c=cargo&a=nuevo" class="btn btn-success col-2 fw-bold"><img src="img/add_circle_white_24dp.svg"> Nuevo</a>
</div>
<br>
<div class="container-xxl" style="font-family: 'Open Sans', sans-serif;">
    <table class="table">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">TÍTULO</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->model->listar() as $r) : ?>
            <tr class="text-center">
                <td><?php echo $r->idcargo; ?></td>
                <td><?php echo $r->titulo; ?></td>
                <td><a href="?c=cargo&a=viewEdit&id=<?php echo $r->idcargo; ?>"><img src="img/edit_black_24dp.svg"></a></td>
                <td><a href="?c=cargo&a=eliminar&id=<?php echo $r->idcargo; ?>"><img src="img/delete_black_24dp.svg"></a></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>