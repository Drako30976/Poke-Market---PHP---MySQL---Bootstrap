<?php
$tipo = (new Tipo())->type_list();
$catalogo = (new Pokes())->lista_pokes();

?>
<h2 class="d-flex justify-content-center"><?= $titulo ?></h2>
<div class="contenedor">
    <form method="POST" action="index.php?sec=pokemons" class="d-flex justify-content-around align-items-center">
        <div class="col-md-4 mb-3">
            <label for="tipo1" class="form-label">Tipo Primario</label>
            <select class="form-select" name="tipo1" id="tipo1" required>
                <option value="" selected disabled>Elija una opción</option>
                <?PHP foreach ($tipo as $T) { ?>
                    <option value="<?= $T->getId() ?>" ?>
                        <?= $T->getNombre() ?></option>
                <?PHP } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="tipo2" class="form-label">Tipo Secundario</label>
            <select class="form-select" name="tipo2" id="tipo2">
                <option value="" selected disabled>Elija una opción</option>
                <?PHP foreach ($tipo as $T) { ?>
                    <option value="<?= $T->getId() ?>" ?>
                        <?= $T->getNombre() ?></option>
                <?PHP } ?>
            </select>
        </div>
        <button type="submit" name="boton_submit" class="btn btn-dark">Buscar</button>
    </form>
    <div class="row">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["boton_submit"])) {
            $type1 = $_POST['tipo1'] ?? FALSE;
            $type2 = $_POST['tipo2'] ?? FALSE;
            $catalogoFiltrado = (new Pokes())->typeFilter($type1, $type2);
        }
        if (!empty($catalogoFiltrado)) {
            foreach ($catalogoFiltrado as $valor) { ?>
                <div class="col-lg-4">
                    <div class="card m-1 cardcatalogo">
                        <div class="card-body">
                            <h3 class="card-title"><?= $valor->getNombre() ?></h3>
                        </div>
                        <img src="img/<?= $valor->getImagen() ?>" class="card-img-top" alt="pokemon">
                        <ul class="list-group list-group-flush">
                            <li>
                                <p>Region: <?= $valor->getRegion() ?> </p>
                            </li>
                            <li>
                                <p>Eclocion: <?= $valor->getFecha() ?> </p>
                            </li>
                            <li>
                                <p>Habilidad: <?= $valor->getHabilidad() ?> </p>
                            </li>
                            <li>
                                <p>Precio: <span>$<?= $valor->getPrecio() ?></span></p>
                            </li>
                        </ul>
                        <li class="button">
                            <a href="index.php?sec=producto&id=<?= $valor->getId() ?>">Ver Mas</a>
                        </li>
                    </div>
                </div>
            <?php
            }
        } else {
            foreach ($catalogo as $valor) { ?>
                <div class="col-lg-4">
                    <div class="card m-1 cardcatalogo">
                        <div class="card-body text-center">
                            <h3 class="card-title"><?= $valor->getNombre() ?></h3>
                        </div>
                        <img src="img/<?= $valor->getImagen() ?>" class="card-img-top" alt="pokemon">
                        <ul class="list-group list-group-flush">
                            <li>
                                <p class="fs-5">Region: <?= $valor->getRegion() ?> </p>
                            </li>
                            <li>
                                <p class="fs-5">Eclocion: <?= $valor->getFecha() ?> </p>
                            </li>
                            <li>
                                <p class="fs-5">Habilidad: <?= $valor->getHabilidad() ?> </p>
                            </li>
                            <li>
                                <p class="fs-5">Precio: <span>$<?= $valor->getPrecio() ?></span></p>
                            </li>
                        </ul>
                        <li class="button">
                            <a href="index.php?sec=producto&id=<?= $valor->getId() ?>" class="fs-3 fw-bold">Ver Mas</a>
                        </li>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>