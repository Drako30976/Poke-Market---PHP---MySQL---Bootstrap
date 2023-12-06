<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $hab = (new Habilidad)->Habilidad($id);
    $hab->delete_hab();   
    (new Alerta())->add_alerta('success', "Habilidad Borrada con exito.");
    header('Location: ../index.php?sec=admin_hab');
} catch (Exception $e) {
    (new Alerta())->add_alerta('success', "Error al borrar la Habilidad.");
    header('Location: ../index.php?sec=admin_hab');
}
