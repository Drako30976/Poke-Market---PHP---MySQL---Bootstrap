<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;


try {
    $region = (new Region())->Region($id);
    $region->edit_region(
        $postData['nombre'],
        $postData['descripcion'],
    );
    (new Alerta())->add_alerta('success', "Region editado con exito.");
    header('Location: ../index.php?sec=admin_region');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al editar la region.");
    header('Location: ../index.php?sec=admin_region');
}