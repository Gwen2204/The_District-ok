<?php
include 'header.php';
//include_once ('classes/categorie.classe.php');
include_once ('classes/DAO.php');





$tableau3 = plat_categorie();


?>

<div class= "container-fluid">
    <div class="row">

             <?php foreach ($tableau3 as $plat_categorie): ?>
                <div class="col col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="col-3 mx-8 d-flex justify-content-center mx-6 my-1" style="height: 265px;">        
                                        <a href="plat_cat.php?id_categorie=<?=$plat_categorie->id ?>"> 
                                            <img class="zoom" style="height:265px" src="/assets/img/category/<?= $plat_categorie->image ?>">
                                        </a>   
                                        <p> <?= $plat_categorie->libelle?> </p>    
                </div>
                </div>
            <?php endforeach; ?>
        
    </div>

</div>


<?php
include 'footer.php';
?>  