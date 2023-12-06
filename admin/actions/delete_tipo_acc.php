<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $tipo = (new Tipo)->Tipo($id);
    $tipo->delete_type();   
    (new Alerta())->add_alerta('success', "Tipo Borrado con exito.");
    header('Location: ../index.php?sec=admin_tipo');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al borrar el tipo.");
    header('Location: ../index.php?sec=admin_tipo');
}
