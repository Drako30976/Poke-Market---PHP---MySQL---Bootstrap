<?php
$id = $_GET['id'] ?? FALSE;
$pokemon = (new Pokes())->filtrado_Id($id);

?>
<?php
if (!empty($pokemon)) { ?>
    <div class="tarjeta">
        <p><?= $pokemon->getNombre() ?></p>
        <div class="main">
            <div class="imagen">
                <img src="img/<?= $pokemon->getImagen() ?>" alt="">
            </div>
            <div class="contenido">
                <ul>
                    <li>
                        <p><span>Region:</span> <?= $pokemon->getRegion() ?></p>
                    </li>
                    <li>
                        <p><span>Generacion:</span> <?= $pokemon->getGeneracion() ?></p>
                    </li>
                    <li>
                        <p><span>Numero en la Pokedex:</span> <?= str_pad($pokemon->getNumero(), 3, 0, STR_PAD_LEFT) ?></p>
                    </li>
                    <li>
                        <p><span>Habilidad</span>: <?= $pokemon->getHabilidad() ?></p>
                    </li>
                    <li>
                        <p><span>Tipos:</span> <?= $pokemon->getTipo1() ?> <?= $pokemon->getTipo2() ?></p>
                    </li>
                    <li>
                        <p><span>Peso:</span> <?= $pokemon->getPeso() ?> Kg</p>
                    </li>
                    <li>
                        <p><span>Altura:</span> <?= $pokemon->getAltura() ?> Mtrs</p>
                    </li>
                    <li>
                        <p><span>Fecha de Eclocion:</span> <?= $pokemon->getFecha() ?></p>
                    </li>
                    <li>
                        <p><span>Pokedex</span> <?= $pokemon->getDescripcion_dex() ?></p>
                    </li>
                    <li>
                        <p><span>Precio: </span><span class="precio">$<?= $pokemon->getPrecio() ?></span></p>
                    </li>
                    <form action="admin/actions/add_item_acc.php" method="GET" class="row">
                        <div class="col-6 d-flex align-items-center">
                            <label for="q" class="fw-bold me-2">Cantidad: </label>
                            <input type="number" class="form-control" value="1" name="q" id="q">
                        </div>
                        <div class="col-6">
                            <input type="submit" value="AGREGAR A CARRITO" class="btn btn-danger w-100 fw-bold">
                            <input type="hidden" value="<?= $id ?>" name="id" id="id">

                        </div>
                    </form>
                </ul>
            </div>
        </div>
    </div>
<?php
} else { ?>
    <h2>No se encontró el producto deseado.</h2>
<?php
}

?>
</div>