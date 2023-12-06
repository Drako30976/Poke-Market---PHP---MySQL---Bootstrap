<?php
require_once "../functions/autoload.php";

$conexion = new Conexion();

$secciones_validas = [
  "login" => [
    "titulo" => "Iniciar Sesion",
    "restrict" => FALSE
  ],
  "dashboard" => [
    "titulo" => "Panel de administracion",
    "restrict" => TRUE
  ],
  "admin_pokemon" => [
    "titulo" => "Administracion de Pokemons",
    "restrict" => TRUE
  ],
  "add_pokemon" => [
    "titulo" => "Cargar nuevo Pokemon",
    "restrict" => TRUE
  ],
  "edit_pokemon" => [
    "titulo" => "Editar Pokemon",
    "restrict" => TRUE
  ],
  "delete_pokemon" => [
    "titulo" => "¿Estas seguro de eliminar el Pokemon?",
    "restrict" => TRUE
  ],
  "admin_tipo" => [
    "titulo" => "Administracion de Tipos",
    "restrict" => TRUE
  ],
  "add_tipo" => [
    "titulo" => "Cargar nuevo Tipo",
    "restrict" => TRUE
  ],
  "edit_tipo" => [
    "titulo" => "Editar Tipos",
    "restrict" => TRUE
  ],
  "delete_tipo" => [
    "titulo" => "¿Estas seguro de eliminar un Tipo?",
    "restrict" => TRUE
  ],
  "admin_region" => [
    "titulo" => "Administracion de Regiones",
    "restrict" => TRUE
  ],
  "add_region" => [
    "titulo" => "Cargar una nueva Region",
    "restrict" => TRUE
  ],
  "edit_region" => [
    "titulo" => "Editar Region",
    "restrict" => TRUE
  ],
  "delete_region" => [
    "titulo" => "¿Estas seguro de eliminar una Region?",
    "restrict" => TRUE
  ],
  "admin_gen" => [
    "titulo" => "Administracion de Generaciones",
    "restrict" => TRUE
  ],
  "add_gen" => [
    "titulo" => "Cargar una nueva Generacion",
    "restrict" => TRUE
  ],
  "edit_gen" => [
    "titulo" => "Editar una Generacion",
    "restrict" => TRUE
  ],
  "delete_gen" => [
    "titulo" => "¿Estas seguro de eliminar una Generacion?",
    "restrict" => TRUE
  ],
  "admin_hab" => [
    "titulo" => "Administracion de Generaciones",
    "restrict" => TRUE
  ],
  "add_hab" => [
    "titulo" => "Cargar una nueva Generacion",
    "restrict" => TRUE
  ],
  "edit_hab" => [
    "titulo" => "Editar una Generacion",
    "restrict" => TRUE
  ],
  "delete_hab" => [
    "titulo" => "¿Estas seguro de eliminar una Generacion?",
    "restrict" => TRUE
  ]
];
$section = $_GET['sec'] ?? "dashboard";

if (!array_key_exists($section, $secciones_validas)) {
  $vista = "error404";
  $titulo = "404: Página no encontrada";
} else {
  $vista = $section;
  if ($secciones_validas[$section]['restrict']) {
    (new Autentificacion())->verify();
  }
  $titulo = $secciones_validas[$section]['titulo'];
}

$userData = $_SESSION['loggedIn'] ?? FALSE;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/stylos.css">
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
          <a class="nav-link fs-5 fw-bold <?= $userData ? "" : "d-none" ?>" href="index.php?sec=dashboard">Dashboard</a>

          <a class="nav-link fs-5 fw-bold <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_pokemon">Adm. Pokemons</a>

          <a class="nav-link fs-5 fw-bold <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_tipo">Adm. Tipos</a>

          <a class="nav-link fs-5 fw-bold <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_region">Adm. Regiones</a>

          <a class="nav-link fs-5 fw-bold <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_gen">Adm. Generaciones</a>

          <a class="nav-link fs-5 fw-bold <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_hab">Adm. Habilidad</a>

          <a class="nav-link fw-bold <?= !$userData ? "" : "d-none" ?>" href="index.php?sec=login">Login</a>

          <a class="nav-link fw-bold <?= $userData ? "" : "d-none" ?>" href="actions/auth_logout.php">Logout: <span class="fw-light"><?= $userData['username'] ?? "" ?></span></a>

        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <?php
    require_once "views/$vista.php";
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>

</html>