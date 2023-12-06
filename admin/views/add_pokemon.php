<?PHP
$region = (new Region())->region_list();
$gen = (new Generacion())->gen_list();
$habilidad=(new Habilidad())->hab_list();
$tipo = (new Tipo())->type_list();


?>

<div class="row my-5">
    <div class="col">
    <h2 class="d-flex justify-content-center pb-2"><?= $titulo ?></h2>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_pokemon_acc.php" method="POST" enctype="multipart/form-data">
                
            <div class="col-md-4 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="region" class="form-label">Region</label>
                    <select class="form-select" name="region" id="region" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?PHP foreach ($region as $R) { ?>
                            <option value="<?= $R->getId() ?>">
                                <?= $R->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="habilidad" class="form-label">Habilidad</label>
                    <select class="form-select" name="habilidad" id="habilidad" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?PHP foreach ($habilidad as $H) { ?>
                            <option value="<?= $H->getId() ?>">
                                <?= $H->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="generacion" class="form-label">Generacion</label>
                    <select class="form-select" name="generacion" id="generacion" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?PHP foreach ($gen as $G) { ?>
                            <option value="<?= $G->getId() ?>">
                                <?= $G->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="peso" class="form-label">Peso</label>
                    <input type="number" class="form-control" id="peso" name="peso" step="any" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="altura" class="form-label">Altura</label>
                    <input type="number" class="form-control" id="altura" name="altura" step="any" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="fecha" class="form-label">Fecha de eclocion</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" step="any" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="tipo1" class="form-label">Tipo Primario</label>
                    <select class="form-select" name="tipo1" id="tipo1" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?PHP foreach ($tipo as $T) { ?>
                            <option value="<?= $T->getId() ?>">
                                <?= $T->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="tipo2" class="form-label">Tipo Secundario</label>
                    <select class="form-select" name="tipo2" id="tipo2">
                        <option value="" selected disabled>Elija una opción</option>
                        <?PHP foreach ($tipo as $T) { ?>
                            <option value="<?= $T->getId() ?>">
                                <?= $T->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="numero_dex" class="form-label">Numero en la pokedex</label>
                    <input type="number" class="form-control" id="numero_dex" name="numero_dex" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>


                <div class="col-md-12 mb-3">
                    <label for="descripcion_dex" class="form-label">Descripcion de la pokedex</label>
                    <textarea class="form-control" id="descripcion_dex" name="descripcion_dex" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-warning">Crear Pokemon</button>

            </form>

        </div>
    </div>

</div>