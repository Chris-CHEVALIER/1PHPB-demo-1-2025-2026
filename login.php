<?php
include("header.php");

// Connexion utilisateur 
if ($_POST) {
    $user = $userController->getByEmail($_POST["email"]);
    if ($user && password_verify($_POST["password"], $user->getPassword())) {
        $_SESSION["email"] = $_POST["email"];
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<p class='text-danger'>Adresse e-mail ou mot de passe incorrect.</p>";
    }
}
?>

<form method="post">
    <h1>Se connecter</h1>
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" required class="form-control" placeholder="Votre adresse e-mail">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control" required placeholder="Votre mot de passe">
    <input type="submit" value="Se connecter" class="btn btn-success mt-3">

    <br><a href="./register.php">Vous n'avez pas encore de compte ?</a>
</form>

<?php
include("footer.php")
?>