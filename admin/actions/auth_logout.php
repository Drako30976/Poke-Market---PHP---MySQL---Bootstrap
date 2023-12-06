<?PHP
require_once "../../functions/autoload.php";


(new Autentificacion())->log_out();
header('location: ../index.php?sec=login');
