<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$postFiles = $_FILES['imagen'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;



try {

    $poke = (new Pokes())->filtrado_Id($id);
    echo "<pre>";
    print_r($poke);
    echo "</pre>";

    if (!empty($postFiles['tmp_name'])) {
        $imagen = (new Imagen())->uploadIMG(__DIR__ . "/../../img", $postFiles);
        (new Imagen())->delIMG(__DIR__ . "/../../img/covers/" . $postData['imagen']);
    } else {
        $imagen = $postData['imagen'];
    }

    $poke->edit_poke(
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
    (new Alerta())->add_alerta('success', "Pokemon editado con exito.");
    header('Location: ../index.php?sec=admin_pokemon');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al editar el pokemon.");
    header('Location: ../index.php?sec=admin_pokemon');
}
