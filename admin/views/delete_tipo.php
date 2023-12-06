<?PHP
$id = $_GET['id'] ?? FALSE;
$tipo = (new Tipo())->Tipo($id);

?>

<div class="row my-5 g-3">
    <h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
    <div class="row my-5 d-flex align-items-center">
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Debilidad</th>
                    <th scope="col">Fortaleza</th>
                    <th scope="col">Inmunidad</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <tr>
                    <td><?= $tipo->getNombre() ?></td>
                    <td><?= $tipo->getDebilidad() ?></td>
                    <td><?= $tipo->getFortaleza() ?></td>
                    <td><?= $tipo->getInmunidad() ?></td>
                </tr>
            </tbody>
        </table>
        <a href="actions/delete_tipo_acc.php?id=<?= $tipo->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>

    </div>