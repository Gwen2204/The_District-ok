<?php
include 'header.php';
include_once ('classes/plat.classe.php');
include_once ('classes/DAO.php');

$tableau1 = p_plat();

?>

<div class= "container-fluid">
<div class="row">

<?php foreach ($tableau1 as $plat): ?>

<br>
<div class = "col-2">
<img class="p-3" height="265px" src="/assets/img/food/<?= $plat->image ?>">
</div>

<div class="col-3">
    <br>
<p> <?= $plat->libelle?> </p>


<p> <?= $plat->description?> </p>


<p> <?= $plat->prix?> </p>

<form action = "commande.php" method = "POST">
    <input type= "number" name="quantity" id="quantity" min="1" max="100">
    <input type= "hidden" name="plat" id="plat" value="<?= $plat->id ?>">
    <input id="button" name="ajouter" title="Ajouter au panier" class="text-dark a-button-input" type="submit" value="Ajouter au panier"> 
</form>
</div>






<?php endforeach;?>

</div>

</div>

<?php
include 'footer.php';
?> 