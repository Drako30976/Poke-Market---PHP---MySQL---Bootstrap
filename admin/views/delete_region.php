<?PHP
$id = $_GET['id'] ?? FALSE;
$region = (new Region())->Region($id);

?>

<div class="row my-5 g-3">
    <h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
    <div class="row my-5 d-flex align-items-center">
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descipcion</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <tr>
                    <td><?= $region->getNombre() ?></td>
                    <td><?= $region->getDescipcion() ?></td>
                </tr>
            </tbody>
        </table>
        <a href="actions/delete_region_acc.php?id=<?= $region->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>

    </div>