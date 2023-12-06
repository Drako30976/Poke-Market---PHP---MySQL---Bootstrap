<?php
$gen = (new Generacion)->gen_list();

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
                <th scope="col">Juegos Asociados</th>
            </tr>
        </thead>

        <tbody class="text-center">
            <?PHP foreach ($gen as $P) { ?>
                <tr>
                    <td><?= $P->getNombre()?></td>
                    <td><?= $P->getJuego()?></td>
                    <td>
                    <a href="index.php?sec=edit_gen&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                    <a href="index.php?sec=delete_gen&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?PHP } ?>
        </tbody>

    </table>
    <a href="index.php?sec=add_gen" class="btn btn-primary mt-5"> Cargar Generacione</a>
</div>