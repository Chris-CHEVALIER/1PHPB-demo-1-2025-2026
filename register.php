<?php
include("header.php");
if ($_POST) {
    $userController->create(new User($_POST));
    $_SESSION["email"] = $_POST["email"];
    echo "<script>window.location.href='index.php'</script>";
}
?>

<form method="post">
    <h1>S'inscrire</h1>
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" required class="form-control" placeholder="Votre adresse e-mail">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control" required placeholder="Votre mot de passe">
    <input type="submit" value="S'inscrire" class="btn btn-primary mt-3">
    <br>
    <a href="./login.php">Vous avez déjà un compte ?</a>

</form>

<?php
include("footer.php")
?>