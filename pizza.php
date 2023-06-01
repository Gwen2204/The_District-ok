<?php
include 'header.php';
?>
<?php

// On se connecte à la BDD via notre fichier db.php :
require "db.php";
$db = connexionBase();

// On récupère l'ID passé en paramètre :
$id = $_GET["id"];

// On crée une requête préparée avec condition de recherche :
$requete = $db->prepare(
    "SELECT * 
    FROM plat
    JOIN commande ON plat.commande_id=commande.commande_id
    WHERE plat.plat_id=?"
);

// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute(array($id));

// on récupère le résultat :
$myplat = $requete->fetch(PDO::FETCH_OBJ);

// on clôt la requête en BDD
$requete->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Disque modification</title>
</head>

<div class="container mt-3">
        <h1>Détails</h1>
            <div class="row">
                <div class=col-12>
                    <form action="">
                        <div class="row">
                            <div class="col-6"> 
                                <label>Titre</label>
                                <input type="text" class="form-control" name="title" value="<?= $myplat->plat_libelle ?>" disabled /><br>
                                <label>Année</label>
                                <input type="text" class="form-control" name="year" value="<?= $myplat->plat_description ?>" disabled /><br>
                                <label>Label</label>
                                <input class="form-control" name="label" value="<?= $myplat->plat_prix ?>" disabled /><br>
                               
                                <label>Image</label><br>
                                <img src="/assets/img/categorie/<?= $myplat->image ?>" alt="..." class="rounded float-left img-fluid mb-3" name="pics">
                            </div> 
                           
                            
                            



                            <div class="d-flex">
                                <!-- bouton midifier -->
                                <a href="modif.disc.php?id=<?=$myArtist->disc_id?>"<button type="button" name="id" tilte="Modifier" alt="Modifier" class=" btn btn-primary btn-sm mx-1 mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                </svg></button>
                                <!-- bouton retour -->
                                <a href="script_disc_delete.php?id=<?= $myArtist->disc_id?>"<button type="button" title="Supprimer" alt="Supprimer" class="btn btn-danger btn-sm mx-1 mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg></button>
                                <!-- bouton ajouter -->
                                <a href="accueil.php"><button type="button" tilte="Retour" alt="Retour" class=" btn btn-warning btn-sm mx-1 mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left text-light fw-bold" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                </svg></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </form>

</body>
</html>