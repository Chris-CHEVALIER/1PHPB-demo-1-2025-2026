<?php

// Suppression du véhicule
require("header.php");

if (!$_SESSION || !$_SESSION["email"]) {
    echo "<script>window.location.href='index.php'</script>";
} else {

    $vehicleController->delete($_GET["id"]);
    echo "<script>window.location.href='index.php'</script>";
}
