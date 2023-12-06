<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;

try {
    $generacion = (new Generacion())->generacion($id,$juego);
    $generacion->edit_gen(
        $postData['nombre'],
        $postData['juego'],

    );
    (new Alerta())->add_alerta('success', "Generacion editada con exito.");
    header('Location: ../index.php?sec=admin_gen');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al editar la generaciojn.");
    header('Location: ../index.php?sec=admin_gen');
}