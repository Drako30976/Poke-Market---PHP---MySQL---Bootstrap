<?php
require_once "../../functions/autoload.php";
$postData= $_POST;
$postFiles= $_FILES['imagen'];
$id = $_GET['id'] ?? FALSE;

echo "<pre>";
print_r($postData);
echo "</pre>";


try {

    $imagen = (new Imagen())->uploadIMG(__DIR__ . "/../../img", $postFiles);

    (new Pokes())->insert_poke(
        $postData['region'],
        $postData['generacion'],
        $postData['habilidad'],
        $postData['tipo1'],
        $postData['peso'],
        $postData['altura'],
        $postData['fecha'],
        $imagen,
        $postData['precio'],
        $postData['nombre'],
        $postData['numero_dex'],
        $postData['descripcion_dex'],
        $postData['tipo2']
    );
    (new Alerta())->add_alerta('success', "Pokemon creado con exito.");
    header('Location: ../index.php?sec=admin_pokemon');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al crear pokemon.");
    header('Location: ../index.php?sec=admin_pokemon');
}



// SELECT pokemon.*, COUNT(*) AS resultado FROM `pokemon` 
// JOIN pokemon_x_tipo ON pokemon.id = pokemon_x_tipo.pokemon_id
// WHERE (pokemon_x_tipo.tipo_id = 11 OR pokemon_x_tipo.tipo_id=6)
// GROUP BY pokemon.id  
// HAVING COUNT(*) = 2
// ORDER BY `resultado` ASC;