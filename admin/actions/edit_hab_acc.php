<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;

try {
    $hab = (new Habilidad())->Habilidad($id,$descipcion);
    $hab->insert_hab(
        $postData['nombre'],
        $postData['descipcion'],

    );
    (new Alerta())->add_alerta('success', "Habilidad editada con exito.");
    header('Location: ../index.php?sec=admin_hab');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al editar con exito.");
    header('Location: ../index.php?sec=admin_hab');
}