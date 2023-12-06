<?php
$pokes = (new Pokes)->lista_pokes();

?>
<h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
<div class="row my-5 d-flex align-items-center">
<div>
        <?= (new Alerta())->get_alertas(); ?>
    </div>
   <table class="table">

        <thead class="text-center">
            <tr>
                <th scope="col" width="10%">Imágen</th>
                <th scope="col" width="15%">Nombre</th>
                <th scope="col" width="15%">Tipos</th>
                <th scope="col" width="10%">Habilidad</th>
                <th scope="col" width="25%">Pokedex</th>
                <th scope="col" width="10%">Acciones</th>
            </tr>
        </thead>

        <tbody class="text-center">
            <?PHP foreach ($pokes as $P) { ?>
                <tr>
                    <td><img src="../img/<?= $P->getImagen()?>" alt="Imágen de <?= $P->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>
                    <td><?= $P->getNombre() ?></td>
                    <td><?= $P->getTipo1() . ($P->getTipo2() ? " / " . $P->getTipo2() : "") ?></td>
                    <td><?= $P->getHabilidad() ?></td>
                    <td><?= $P->getDescripcion_dex() ?></td>
                    <td>
                        <a href="index.php?sec=edit_pokemon&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                        <a href="index.php?sec=delete_pokemon&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?PHP } ?>
        </tbody>

    </table>
    <a href="index.php?sec=add_pokemon" class="btn btn-primary mt-5"> Cargar Pokemon</a>
</div>