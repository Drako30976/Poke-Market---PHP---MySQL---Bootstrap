<?php
$regions = (new Region)->region_list();

?>
<h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
<div class="row my-5 d-flex align-items-center">
<div>
        <?= (new Alerta())->get_alertas(); ?>
    </div>
   <table class="table">

        <thead>
            <tr class="text-center">
                <th scope="col" width="15%">Nombre</th>
                <th scope="col" width="60%">Descipcion</th>
            </tr>
        </thead>

        <tbody class="text-center">
            <?PHP foreach ($regions as $P) { ?>
                <tr>
                    <td><?= $P->getNombre() ?></td>
                    <td><?= $P->getDescipcion()?></td>
                    <td width="10%">
                        <a href="index.php?sec=edit_region&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                        <a href="index.php?sec=delete_region&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?PHP } ?>
        </tbody>

    </table>
    <a href="index.php?sec=add_region" class="btn btn-primary mt-5"> Cargar Region</a>
</div>