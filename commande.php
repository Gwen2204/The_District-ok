<?php
include 'header.php';
include_once ('classes/DAO.php');

if(isset($_POST["plat"]) && isset($_POST["quantity"])) {
    $id_plat= $_POST["plat"];
    $quantity= $_POST["quantity"];
    // var_dump($_POST);
    // var_dump($id_plat, $quantity);
}


$plat = plat_detail($id_plat);
// var_dump($plat);

?>

<div class="container-fluid">

        <div class="row">

            <div class="col-md-4 mx-auto">

        

                <form action="script_commande.php" method="post" id="contact" name="contact">
                    

                    <?php foreach ($plat as $plat_detail): ?>

                    <img class="p-3" style="height:265px" src="/assets/img/food/<?= $plat_detail->image ?>">
                    
                    <p> <?= $plat_detail->libelle?> </p>


                    <p> <?= $plat_detail->description?> </p>


                    <p> <?= $plat_detail->prix?> </p>


                    <p> Quantité commandée : <?= $quantity ?> </p>

                   

                    <?php endforeach; ?>


                    
                    <fieldset>
                        <legend class="display-4">Vos coordonnées</legend>
                        <br>
                        <br>
                        * Ces zones sont obligatoires
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="nom">Votre nom*:</label>
                            <input type="text" name="nom" class="form-control" placeholder="Veuillez saisir votre nom" required>
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Votre prénom*:</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Veuillez saisir votre prénom" requiered>
                        </div>

                        <div class="form-group">
                            <br><label for="adresse">Adresse:</label>
                            <input type="adresse" name="adresse" class="form-control" placeholder="Veuillez saisir votre adresse" required>
                        </div>
                   
                        <div class="form-group">
                            <br><label for="Code postal">Code postal*:</label>
                            <input type="code postal" name="cp" class="form-control" placeholder="Veuillez saisir votre code postal" required>
                        </div>

                        <div class="form-group">
                            <br><label for="ville">Ville:</label>
                            <input type="ville" name="ville" class="form-control" placeholder= "Veuillez saisir votre ville"  required>
                        </div>

                        <div class="form-group">
                            <br><label for="tel">Téléphone:</label>
                            <input type="tel" name="tel" class="form-control" placeholder="Veuillez saisir votre numéro de téléphone" required>
                        </div>

                        <div class="form-group">
                            <br><label for="email">Email*:</label>
                            <input type="email" name="email" class="form-control" placeholder="Veuillez saisir votre adresse mail" required>
                        </div>

                    </fieldset>
                    <input type="hidden" name="plat_id" value="<?= $plat_detail->id ?>">
                    <input type="hidden" name="quantite" value="<?= $quantity ?>">
                    <input type="hidden" name="prix" value="<?= $plat_detail->prix ?>">
                    <input type="hidden" name="libelle" value="<?= $plat_detail->libelle ?>">
                    <br>
                    <br>
                    <button type="submit">Commander</button>
                    <br>
                    <br>
                    
                </form>
                <br>

</div>
    </div>
        </div>



<?php
include 'footer.php';
?>  