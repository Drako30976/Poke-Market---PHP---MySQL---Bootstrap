<?php
require_once "../../functions/autoload.php";
$postData= $_POST;
echo "<pre>";
print_r($postData);
echo "</pre>";

try {
    (new Habilidad())->insert_hab(
        $postData['nombre'],
        $postData['descipcion']
    );
    (new Alerta())->add_alerta('success', "Habilidad cargada con exito.");
    header('Location: ../index.php?sec=admin_hab');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Habilidad cargada con exito.");
    header('Location: ../index.php?sec=admin_hab');
}