<?php require("header.php");

// Modification PHP
$vehicle = $vehicleController->read($_GET["id"]);

if ($_POST) {
  $vehicle->hydrate($_POST);
  $vehicleController->update($vehicle);
  echo "<script>window.location.href='index.php'</script>";
}

?>
<h1>Modifier <?= $vehicle->getBrand() . " " . $vehicle->getModel() ?></h1>
<form method="POST">
  <label for="brand">Marque</label>
  <input type="text" value="<?= $vehicle->getBrand() ?>" class="form-control" name="brand" id="brand" placeholder="La marque" required minlength="3" maxlength="30">
  <label for="model">Modèle</label>
  <input type="text" value="<?= $vehicle->getModel() ?>" class="form-control" name="model" id="model" placeholder="Le modèle" required minlength="3" maxlength="30">
  <label for="doorsNumber">Nombres de portes</label>
  <input type="number" value="<?= $vehicle->getDoorsNumber() ?>" class="form-control" name="doorsNumber" id="doorsNumber" placeholder="Nombres de portes du véhicule" required min="3" max="5">
  <label for="color">Couleur</label>
  <input type="color" value="<?= $vehicle->getColor() ?>" class="form-control" name="color" id="color" placeholder="La couleur" required>
  <label for="horses">Nombres de chevaux</label>
  <input type="number" value="<?= $vehicle->getHorses() ?>" class="form-control" name="horses" id="horses" placeholder="Nombres de chevaux du véhicule" required min="4" max="500">
  <label for="image">Image</label>
  <input type="url" value="<?= $vehicle->getImage() ?>" class="form-control" name="image" id="image" placeholder="Image du véhicule" required>
  <label for="price">Prix</label>
  <input type="number" value="<?= $vehicle->getPrice() ?>" class="form-control" name="price" id="price" placeholder="Prix du véhicule" required>

  <input type="submit" class="btn btn-warning mt-3" value="Modifier">
</form>

<?php require "footer.php" ?>