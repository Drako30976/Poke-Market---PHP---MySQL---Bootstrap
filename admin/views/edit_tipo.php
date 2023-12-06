<?PHP
$id = $_GET['id'] ?? FALSE;
$tipo = (new Tipo())->Tipo($id);



?>

<div class="row my-5">
    <div class="col">
    <h2 class="d-flex justify-content-center"><?= $titulo ?></h2>  
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_tipo_acc.php?id=<?= $tipo->getId() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $tipo->getNombre() ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="debilidad" class="form-label">Debilidad</label>
                    <input type="text" class="form-control" id="debilidad" name="debilidad" value="<?= $tipo->getDebilidad() ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fortaleza" class="form-label">Fortaleza</label>
                    <input type="text" class="form-control" id="fortaleza" name="fortaleza" value="<?= $tipo->getFortaleza() ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="inmunidad" class="form-label">Inmunidad</label>
                    <input type="text" class="form-control" id="inmunidad" name="inmunidad" value="<?= $tipo->getInmunidad()?>" required>
                </div>

                <button type="submit" class="btn btn-warning">Editar</button>

            </form>
        </div>
    </div>
</div>