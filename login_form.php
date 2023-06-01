<?php
require('login_script.php');
require_once('header.php');
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `utilisateur` WHERE nom_prenom='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = umysqli_nm_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: accueil.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

<form action="login_script.php" method="POST">
<div class="container d-flex">
<div class="input-group mt-5 mx-3 mb-5">
<span class="input-group-text bg-danger text-light" id="basic-addon3" title="C'est l'adresse mail">Identifiant</span>
<input type="text" class="form-control rounded" id="login" name="login" placeholder="Veuillez saisir votre identifiant" value="<?= $usr ?>" aria-describedby="basic-addon3" title="C'est l'adresse mail" require>
<p class="comments"><?php if (isset($_GET["err"]) && $_GET["err"] == "user") { echo "Identifiant incorrect"; } ?></p>
</div>

<div class="input-group mt-5 mx-3 mb-5">
<span class="input-group-text bg-warning text-light" id="basic-addon3" title="La sécurité, c'est essentiel">Mot de passe</span>
<input type="password" class="form-control rounded" id="password" name="password" placeholder="Veuillez saisir votre mot de passe" value="<?= $passwd ?>" aria-describedby="basic-addon3" title="La sécutité, c'est essentiel" require>
<p class="comments"><?php if (isset($_GET["err"]) && $_GET["err"] == "pwd") { echo "Mot de passe incorrect"; } ?></p>
</div>
<p class="text-danger"><?= $msg ?></p>
</div>

<div class="text-center">
<a href="inscription.php"><button type="button" class="btn btn-outline-primary btn-sm mx-5 mb-5" alt="S'inscrire" title="Je m'inscris">S'inscrire</button></a>
<button type="submit" class="btn btn-outline-primary btn-sm mx-5 mb-5" alt="Se connecter" title="Je me connecte" value="">Se connecter</button>
<a href="accueil.php"><button type="button" class="btn btn-outline-primary btn-sm mx-5 mb-5" alt="Retour" title="Retour">Retour</button></a>
</div>



</div>

</form>


<?php
include 'footer.php';
?> 