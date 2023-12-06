<?php
$tipos = (new Tipo)->type_list();

?>
<h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
<div class="row my-5 d-flex align-items-center">
    <div>
        <?= (new Alerta())->get_alertas(); ?>
    </div>
    <table class="table">

        <thead class="text-center">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Debilidad</th>
                <th scope="col">Fortaleza</th>
                <th scope="col">Inmunidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody class="text-center">
            <?PHP foreach ($tipos as $P) { ?>
                <tr>
                    <td><?= $P->getNombre() ?></td>
                    <td><?= $P->getDebilidad() ?></td>
                    <td><?= $P->getFortaleza() ?></td>
                    <td><?= $P->getInmunidad() ?></td>
                    <td>
                        <a href="index.php?sec=edit_tipo&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                        <a href="index.php?sec=delete_tipo&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?PHP } ?>
        </tbody>

    </table>
    <a href="index.php?sec=add_tipo" class="btn btn-primary mt-5 text justify-content-center"> Cargar nuevo Tipo</a>
</div>