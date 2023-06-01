
<?php
include 'header.php';
include_once ('classes/DAO.php');


?>

<div class="container-fluid">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <form action="http://bienvu.net/script.php" method="post" id="contact" name="contact">
                    * Ces zones sont obligatoires
                    <fieldset>
                        <legend class="display-4">Vos coordonnées</legend>
                        <div class="form-group">
                            <label for="nom">Votre nom*:</label>
                            <input type="text" name="nom" class="form-control" placeholder="Veuillez saisir votre nom" required>
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="prénom">Votre prénom*:</label>
                            <input type="text" name="prénom" class="form-control" placeholder="Veuillez saisir votre prénom" requiered>
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
                    <fieldset>
                        <legend class="display-4">Votre demande</legend>
                        <div class="form-group">
                            <label for="sujet">Sujet*:</label>
                            <select name="sujet" id="sujet" class="form-control">
                                <option value="Veuillez sélectionner un sujet">Veuillez sélectionner un sujet</option>
                                <option value="Mescommandes">Mes commandes</option>
                                <option value="Question sur un produit">Question sur un produit</option>
                                <option value="Réclamation">Réclamation</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>
<br>
                        <div class="form-group">
                            <label for="question">Votre question*:</label>
                            <br><textarea name="question" id="question" class="form-control" cols="20" rows="2"
                                placeholder="Votre question" value="" requiered></textarea>
                        </div>

                    </fieldset>

                    <br>
                    <div class="form-check">

                        <div form-check>
                            <input class="form-check-input" type="checkbox" id="flexCheckChecked"  name="check">
                            <label class="form-check-label" for="flexCheckChecked">* J'accepte le formulaire</label>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-dark btn-lg" value="Envoyer" id="submit"> <input
                            type="reset" class="btn btn-dark btn-lg" value="Annuler" id="reset">
                    </div>
                </form>

            </div>
        </div>

    </div>

    </div>
<br>
<br>
<br>
<br>
    <?php
include 'footer.php';
?> 