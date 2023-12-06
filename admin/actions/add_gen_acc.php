<?php
require_once "../../functions/autoload.php";
$postData= $_POST;


try {
    (new Generacion())->insert_gen(
        $postData['nombre'],
        $postData['juego']
    );
    (new Alerta())->add_alerta('success', "Generacion cargada con exito.");
    header('Location: ../index.php?sec=admin_gen');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Error al cargar la Generacion.");
    header('Location: ../index.php?sec=admin_gen');;
}