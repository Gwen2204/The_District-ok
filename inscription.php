<?php
require('login_script.php');
require_once('header.php');
include_once ('classes/DAO.php');

//on valide toutes les données avant dans une fonction valider_donnees() qui prend en paramètres les données une par une
function valider_donnees($donnees){
  $data = trim($donnees);
  $data = stripcslashes($donnees);
  $data = strip_tags($donnees);

  return $data;
}


if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = valider_donnees($_POST['username']);
  $email = valider_donnees($_POST['email']);
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email = $email;
  }else{
    $email=null;
  }
  
  $password = valider_donnees($_POST['password']);
  $pass = password_hash($password, PASSWORD_DEFAULT);

    $res = creerUtilisateur($username, $email, $pass);
    if($res == "OK"){
       echo "<div class='sucess'>
                <h3>Votre inscription est bien prise en compte</h3>
                <p>Cliquez ici pour vous <a href='login_form.php'>connecter</a></p>
            </div>";
    }
}else{
?>

<form class="box" action="" method="post">

    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login_form.php">Connectez-vous ici</a></p>
</form>
<?php } 
?>

<?php
include 'footer.php';
?> 