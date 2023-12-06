<?php
require_once "../../functions/autoload.php";
$postData= $_POST;


try {
    (new Tipo())->insert_type(
        $postData['nombre'],
        $postData['debilidad'],
        $postData['fortaleza'],
        $postData['inmunidad']
    );
    (new Alerta())->add_alerta('success', "Tipo cargado con exito.");
    header('Location: ../index.php?sec=admin_tipo');
} catch (Exception $e) {
    (new Alerta())->add_alerta('error', "Error al cargar el tipo.");
    header('Location: ../index.php?sec=admin_tipo');
}