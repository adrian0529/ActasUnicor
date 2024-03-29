<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center" style="color: #139511; font-family: 'Open Sans', sans-serif; font-weight: bold; font-size: 25px">
                Actas
            </div>
        </div>
    </div>
</div>
<br>
<div class=" container-xxl d-grid gap-2 d-md-flex justify-content-md-end" style="font-family: 'Open Sans', sans-serif;">
    <a href="?c=acta&a=nuevo" class="btn btn-success col-2 fw-bold"><img src="img/add_circle_white_24dp.svg"> Nuevo</a>
</div>
<br>
<div class="container-xxl" style="font-family: 'Open Sans', sans-serif;">
    <table class="table">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">ASUNTO</th>
                <th scope="col">FECHA</th>
                <th scope="col">ID RESPONSABLE</th>
                <th scope="col">PROGRAMA</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->model->listar() as $r) : ?>
            <tr class="text-center">
                <td><?php echo $r->idacta; ?></td>
                <td><?php echo $r->asunto; ?></td>
                <td><?php echo $r->fecha; ?></td>
                <td><?php echo $r->idresponsable; ?></td>
                <td><?php echo $r->titulo; ?></td>
                <td><a href="?c=acta&a=viewEdit&id=<?php echo $r->idacta; ?>"><img src="img/edit_black_24dp.svg"></a></td>
                <td><a href="?c=acta&a=viewShow&id=<?php echo $r->idacta; ?>"><img src="img/visibility_black_24dp.svg"></a></td>
                <td><a href="?c=acta&a=eliminar&id=<?php echo $r->idacta; ?>"><img src="img/delete_black_24dp.svg"></a></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>