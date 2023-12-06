<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $region = (new Region)->Region($id);
    $region->delete_region();   
    (new Alerta())->add_alerta('success', "Region Borrado con exito.");
    header('Location: ../index.php?sec=admin_region');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al borrar la region.");
    header('Location: ../index.php?sec=admin_region');
}
