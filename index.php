<?php require("header.php") ?>
<h1>Accueil</h1>
<h2>Mes véhicules</h2>
<div class="d-flex justify-content-between gap-4 flex-wrap">
  <?php foreach ($vehicles as $vehicle): ?>
    <div class="card" style="width: 18rem;">
      <img src="<?= $vehicle->getImage() ?>" class="card-img-top" alt="<?= $vehicle->getBrand() . " " . $vehicle->getModel() ?>">
      <div class="card-body">
        <h5 class="card-title" style="color: <?= $vehicle->getColor() ?>"><?= $vehicle->getBrand() . " " . $vehicle->getModel() ?></h5>
        <ul class="card-text">
          <li>Nombre de chevaux : <?= $vehicle->getHorses() ?></li>
          <li>Nombre de portes : <?= $vehicle->getDoorsNumber() ?></li>
          <li><b>Prix : <?= $vehicle->getPrice() ?> €</b></li>
        </ul>
        <?php if ($_SESSION && $_SESSION["email"]): ?>
          <a href="update.php?id=<?= $vehicle->getId() ?>" class="btn btn-warning">Modifier</a>
          <a href="delete.php?id=<?= $vehicle->getId() ?>" class="btn btn-danger">Supprimer</a>
        <?php endif ?>
      </div>
    </div>
  <?php endforeach ?>
</div>
<?php require "footer.php" ?>