<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $gen = (new Generacion)->generacion($id);
    $gen->delete_gen();   
    (new Alerta())->add_alerta('success', "Generacion Borrada con exito.");
    header('Location: ../index.php?sec=admin_gen');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo borrar la Generacion.");
    header('Location: ../index.php?sec=admin_gen');
}
