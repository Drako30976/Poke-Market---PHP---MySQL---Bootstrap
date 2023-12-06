<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;


try {
    $tipo = (new Tipo())->Tipo($id);
    $tipo->edit_tipo(
        $postData['nombre'],
        $postData['debilidad'],
        $postData['fortaleza'],
        $postData['inmunidad']
    );
    (new Alerta())->add_alerta('success', "Tipo editado con exito.");
    header('Location: ../index.php?sec=admin_tipo');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al editar el tipo.");
    header('Location: ../index.php?sec=admin_tipo');
}
