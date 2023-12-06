<?PHP
$id = $_GET['id'] ?? FALSE;
$pokemon = (new Pokes())->filtrado_Id($id);

?>

<div class="row my-5 g-3">
    <h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
    <div class="row my-5 d-flex align-items-center">
        <table class="table">

            <thead class="text-center">
                <tr>
                    <th scope="col" width="10%">Imágen</th>
                    <th scope="col" width="15%">Nombre</th>
                    <th scope="col" width="15%">Tipos</th>
                    <th scope="col" width="10%">Habilidad</th>
                    <th scope="col" width="25%">Pokedex</th>
                </tr>
            </thead>

            <tbody class="text-center">
                    <tr>
                        <td><img src="../img/<?= $pokemon->getImagen() ?>" alt="Imágen de <?= $pokemon->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>
                        <td><?= $pokemon->getNombre() ?></td>
                        <td><?= $pokemon->getTipo1() . ($pokemon->getTipo2() ? " / " . $pokemon->getTipo2() : "") ?></td>
                        <td><?= $pokemon->getHabilidad() ?></td>
                        <td><?= $pokemon->getDescripcion_dex() ?></td>
                    </tr>
            </tbody>

        </table>
        <a href="actions/delete_poke_acc.php?id=<?= $pokemon->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>

    </div>