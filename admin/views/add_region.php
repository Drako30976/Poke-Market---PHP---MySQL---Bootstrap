<div class="row my-5">
    <div class="col">
    <h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_region_acc.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-12 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>