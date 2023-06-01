<?php
include 'header.php';
include_once ('classes/DAO.php');


//var_dump($_GET);
if(isset($_GET["id_categorie"])) {
    $id= $_GET["id_categorie"];
}
//var_dump ($_GET["id_categorie"]);


$tableau = plat_cat($id);

?>

<div class= "container-fluid">
    <div class="row">

             <?php foreach ($tableau as $plat_cat): ?>

                <div class="col-5 mx-6 d-flex justify-content-center mx-6 my-1" style="height: 265px;">
                                            <a href="plat.detail.php?id=<?= $plat_cat->id ?>">
                                            <img class="zoom" style="height:265px" src="/assets/img/food/<?= $plat_cat->image ?>">
                                            </a>
                                       
                                        <p> <?= $plat_cat->libelle?> </p>
                                      
                </div>
            <?php endforeach; ?>
        
    </div>

</div>

<?php
include 'footer.php';
?>  