<?php

// Suppression du véhicule
require("header.php");

$vehicleController->delete($_GET["id"]);
echo "<script>window.location.href='index.php'</script>";
