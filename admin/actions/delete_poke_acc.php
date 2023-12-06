<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $poke = (new Pokes)->filtrado_Id($id);
    (new Imagen())->delIMG(__DIR__ . "/../../img/" . $poke->getImagen());
    $poke->delete_poke();   
    (new Alerta())->add_alerta('success', "Pokemon Borrado con exito.");
    header('Location: ../index.php?sec=admin_pokemon');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al borrar el Pokemon.");
    header('Location: ../index.php?sec=admin_pokemon');
}
