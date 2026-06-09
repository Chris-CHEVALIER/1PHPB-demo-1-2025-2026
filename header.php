<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Speed2000 - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<?php

spl_autoload_register(function (string $class) {
    /* $path = str_contains($_SERVER["REQUEST_URI"], "index") || !str_contains($_SERVER["REQUEST_URI"], ".php") ? "." : "..";
    if (str_contains($class, "Controller")) {
        require "$path/controllers/$class.php";
    } else {
        require "$path/models/$class.php";
    } */
    require "$class.php";
});

$vehicleController = new VehicleController();
$userController = new UserController();
$vehicles = $vehicleController->readAll();

/* $path = str_contains($_SERVER["REQUEST_URI"], "index") ? "./views/" : "./";
 */
?>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Speed 2000</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <?php if ($_SESSION && $_SESSION["email"]): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Ajouter un véhicule</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
            <?php if ($_SESSION && $_SESSION["email"]): ?>
                <a class="nav-link" href="logout.php">Se déconnecter</a>
            <?php else: ?>
                <a class="nav-link" href="register.php">S'inscrire</a>
                -
                <a class="nav-link" href="login.php">Se connecter</a>
            <?php endif ?>
        </div>
    </nav>
    <main class="container">