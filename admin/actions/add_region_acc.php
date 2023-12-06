<?php
require_once "../../functions/autoload.php";
$postData= $_POST;


try {
    (new Region())->insert_region(
        $postData['nombre'],
        $postData['descripcion']
    );
    (new Alerta())->add_alerta('success', "Region cargada con exito.");
    header('Location: ../index.php?sec=admin_region');
} catch (Exception $e) {
    (new Alerta())->add_alerta('error', "Error al cargar la Region.");
    header('Location: ../index.php?sec=admin_region');
}