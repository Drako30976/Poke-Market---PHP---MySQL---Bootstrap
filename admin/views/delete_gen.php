<?PHP
$id = $_GET['id'] ?? FALSE;
$gen = (new Generacion())->generacion($id);

?>
<div class="row my-5 g-3">
    <h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
    <div class="row my-5 d-flex align-items-center">
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Juegos</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <tr>
                    <td><?= $gen->getNombre() ?></td>
                    <td><?= $gen->getJuego() ?></td>
                </tr>
            </tbody>
        </table>
        <a href="actions/delete_gen_acc.php?id=<?= $gen->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>

    </div>