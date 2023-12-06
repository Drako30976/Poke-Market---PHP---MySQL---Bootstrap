<?PHP
$id = $_GET['id'] ?? FALSE;
$hab = (new Habilidad())->Habilidad($id);

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
                    <td><?= $hab->getNombre() ?></td>
                    <td><?= $hab->getDescipcion() ?></td>
                </tr>
            </tbody>
        </table>
        <a href="actions/delete_hab_acc.php?id=<?= $hab->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>

    </div>