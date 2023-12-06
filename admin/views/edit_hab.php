<?PHP
$id = $_GET['id'] ?? FALSE;
$hab = (new Habilidad())->Habilidad($id);

?>
<div class="row my-5">
    <div class="col">
    <h2 class="d-flex justify-content-center"><?= $titulo ?></h2>   
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_hab_acc.php?id=<?= $hab->getId() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $hab->getNombre() ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descipcion" class="form-label">Descipcion</label>
                    <input type="text" class="form-control" id="juedescipciongo" name="descipcion" value="<?= $hab->getDescipcion() ?>" required>
                </div>

                <button type="submit" class="btn btn-warning">Editar</button>

            </form>
        </div>
    </div>
</div>