<!DOCTYPE html>
<html lang="fr-FR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Speed2000 - Accueil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<?php

require 'Vehicle.php';

$peugeot206 = new \Vehicle(1, "Peugeot", "206", 3, "bleue", 60, "https://images.caradisiac.com/logos-ref/modele/modele--peugeot-206-32244/S0-modele--peugeot-206-32244.jpg");
$porsche911 = new \Vehicle(2, "Porsche", "911 Carrera", 3, "verte", 394, "https://i.gaw.to/content/photos/54/64/546426-porsche-911-carrera-t-2023-le-retour-de-la-911-legere.jpeg");
$kawasaki = new \Vehicle(3, "Kawasaki", "Ninja H2R", 0, "noire", 310, "https://www.lerepairedesmotards.com/img/actu/2014/nouveaute/kawasaki-ninja-h2r_hd.jpg");
$vehicles = [$peugeot206, $porsche911, $kawasaki];
?>

<body class="container">
  <h1>Accueil</h1>
  <h2>Mes véhicules</h2>
  <main class="d-flex justify-content-between gap-4 flex-wrap">
    <?php foreach ($vehicles as $vehicle): ?>
      <div class="card" style="width: 18rem;">
        <img src="<?= $vehicle->getImage() ?>" class="card-img-top" alt="<?= $vehicle->getBrand() . " " . $vehicle->getModel() ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $vehicle->getBrand() . " " . $vehicle->getModel() . " de couleur " . $vehicle->getColor() ?></h5>
          <ul class="card-text">
            <li>Nombre de chevaux : <?= $vehicle->getHorses() ?></li>
            <li>Nombre de portes : <?= $vehicle->getDoorsNumber() ?></li>
          </ul>
        </div>
      </div>
    <?php endforeach ?>
  </main>
  <h2>S'inscrire</h2>
  <form action="register.php" method="POST">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username" placeholder="Votre nom d'utilisateur" required minlength="5" maxlength="20">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="*********" required minlength="12" maxlength="30">
    <label for="confirm">Confirmer le mot de passe</label>
    <input type="password" name="confirm" id="confirm" placeholder="*********" required minlength="12" maxlength="30">
    <input type="submit" value="S'inscrire">
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>