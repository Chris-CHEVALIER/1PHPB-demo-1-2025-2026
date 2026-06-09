<?php
require_once '../config.php';
require_once ROOT . 'views/layout/header.php';

if (!$_SESSION || !$_SESSION["email"]) {
  echo "<script>window.location.href='../index.php'</script>";
}

// Ajouter le véhicule
if ($_POST) {
  if ($_FILES["image"]["size"] < 2000000) {
    $fileName = $_FILES["image"]["name"];
    if (!is_dir(ROOT . "uploads/")) {
      mkdir(ROOT . "uploads/", 0777, true);
    }
    $serverTargetFile = ROOT . "uploads/" . $fileName;
    $dbTargetFile = "uploads/" . $fileName;
    $fileExtension = pathinfo($serverTargetFile, PATHINFO_EXTENSION); // "png", "jpeg", "pdf", etc.
    if (in_array(strtolower($fileExtension), ["png", "jpg", "webp", "gif", "jpeg", "heic"])) {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $serverTargetFile)) {
        $_POST["image"] = $dbTargetFile;
        $newVehicle = new Vehicle($_POST);
        $vehicleController->create($newVehicle);
        echo "<script>window.location.href='../index.php'</script>";
      }
    } else {
      echo "<p class='text-danger'>Le format du fichier est incorrect.</p>";
    }
  } else {
    echo "<p class='text-danger'>Le fichier est trop volumineux.</p>";
  }
}

?>
<h1>Ajouter un véhicule</h1>
<form method="POST" enctype="multipart/form-data">
  <label for="brand">Marque</label>
  <input type="text" class="form-control" name="brand" id="brand" placeholder="La marque" required minlength="3" maxlength="30">
  <label for="model">Modèle</label>
  <input type="text" class="form-control" name="model" id="model" placeholder="Le modèle" required minlength="3" maxlength="30">
  <label for="doorsNumber">Nombres de portes</label>
  <input type="number" class="form-control" name="doorsNumber" id="doorsNumber" placeholder="Nombres de portes du véhicule" required min="3" max="5">
  <label for="color">Couleur</label>
  <input type="color" class="form-control" name="color" id="color" placeholder="La couleur" required>
  <label for="horses">Nombres de chevaux</label>
  <input type="number" class="form-control" name="horses" id="horses" placeholder="Nombres de chevaux du véhicule" required min="4" max="2000">
  <label for="image">Image</label>
  <input type="file" class="form-control" name="image" id="image" placeholder="Image du véhicule" required>
  <label for="price">Prix</label>
  <input type="number" class="form-control" name="price" id="price" placeholder="Prix du véhicule" required>

  <input type="submit" class="btn btn-success mt-3" value="Ajouter">
</form>

<?php require_once ROOT . 'views/layout/footer.php' ?>