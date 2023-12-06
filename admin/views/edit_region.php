<?PHP
$id = $_GET['id'] ?? FALSE;
$region = (new Region())->Region($id);

?>
<div class="row my-5">
    <div class="col">
    <h2 class="d-flex justify-content-center"><?= $titulo ?></h2>  
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_region_acc.php?id=<?= $region->getId() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $region->getNombre() ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $region->getDescipcion() ?>" required>
                </div>

                <button type="submit" class="btn btn-warning">Editar</button>

            </form>
        </div>
    </div>
</div>