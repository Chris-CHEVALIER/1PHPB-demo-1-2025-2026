<?php
require_once '../config.php';

$_SESSION["email"] = null;
session_unset();
session_destroy();
echo "<script>window.location.href='../index.php'</script>";
