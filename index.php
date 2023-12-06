<?php 
require_once "functions/autoload.php";

$conexion=new Conexion();

$secciones_validas = [
    "home" => [
        "titulo" => "Bienvenidos"
    ],
    "pokemons" => [
        "titulo" => "Listado de Pokemons Disponibles"
    ],
    "contacto" => [
        "titulo" => "Contactanos"
    ],
    "producto" => [
        "titulo" => "Detalles del Pokemon"
    ],
    "sobremi" => [
        "titulo" => "Datos sobre Mi"
    ], 
    "carrito" => [
        "titulo" => "Carrito de compras",
        "restringido" => FALSE
    ]

];
    $section = isset($_GET['sec']) ? $_GET['sec']:'home';

    if (!array_key_exists($section, $secciones_validas)) {
        $vista = "error404";
        $titulo = "404: Página no encontrada";
    } else {
        $vista = $section;
        $titulo = $secciones_validas[$section]['titulo'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&family=Ysabeau+Office:wght@700&display=swap" rel="stylesheet">
    <title>index</title>
</head>
<body class="bg-info">
<h1>Pokemon Market</h1>
<nav class="navbar navbar-expand-lg bg-body-tertiary navegacion">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav m-auto align-items-center text-center">
        <a class="nav-link fs-2 fw-bold" href="index.php?sec=home">Home</a>
        <a class="nav-link fs-2 fw-bold" href="index.php?sec=pokemons">Pokemons</a>
        <a class="nav-link fs-2 fw-bold" href="index.php?sec=contacto">Contactanos</a>
        <a class="nav-link fs-2 fw-bold" href="index.php?sec=sobremi">Sobre Mi</a>
      </div>
    </div>
  </div>
</nav>
    <div class="content">
        <?php 
        require_once "views/$vista.php";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>