<?php
include 'header.php';
include_once ('classes/DAO.php');


Session_start();
$tableau = acc_categorie();
$tableau2 = plat_populaire();

if(isset($_SESSION["confirmation_commande"])){
    //var_dump ($_SESSION["confirmation_commande"]);

    echo '<div id="message" class="alert-success">';
    echo $_SESSION["confirmation_commande"];
    echo '</div>';
    echo "<script type='text/javascript'>
    var cpt = 10;
    timer = setInterval(function(){
        if(cpt>0) 
        {
            --cpt;
        }
        else 
        {
            var doc = document.getElementById('message');
            doc.hidden = true;
            clearInterval(timer);
        }
    }, 500);
    </script>";
    unset ($_SESSION["confirmation_commande"]);

} else if
(isset($_SESSION["commande_non"])){
    echo '<div class= "danger-alert ">';
    echo $_SESSION["commande_non"];
    echo '</div>';
    unset ($_SESSION["ccommande_non"]);
}



?>


        <div class= "search">
                <div class="mx-3 mb-4 p-3">
                    <form action = "search.php" method = "POST" role="search">
                        <div class="d-flex justify-content-center">
                            <input type="search" name="search" id="search" placeholder="Votre recherche" class="mx-3">
                            <button type="submit">Rechercher</button>
             </div> 
          </form>           
 </div>
 </div> 

 
<!-- Catégories des plats limit 6-->

<div class= "container-fluid">
    <div class="row">

             <?php foreach ($tableau as $category): ?>
                <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12 d-flex justify-content-center" >
                <!-- <div class="col-4 d-flex justify-content-center mx-6 my-1" style="height: 265px;">   -->
                                        <div>
                                        <a href="plat_cat.php?id_categorie=<?= $category->id ?>">   
                                            <img class= "zoom" style="height:250px" src="/assets/img/category/<?= $category->image ?>">
                                        </a>  
                                        
                                        <p> <?= $category->libelle?> </p>   
                                        </div>
                                        <br>
                </div>
             
            <?php endforeach; ?>

           
<!-- Plats les plus populaires limit 3-->

<div class="d-flex justify-content-center">
<h1>Les plats populaires</h1>
</div>
                <?php foreach ($tableau2 as $plat_pop): ?>
                    <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12 d-flex justify-content-center">
                          <div> 
                        <a href="plat.detail.php?id=<?= $plat_pop->id ?>">
                            <img class="zoom" style="height:265px" src="/assets/img/food/<?= $plat_pop->image ?>">
                        </a> 
                        
                        <p> <?= $plat_pop->libelle?> </p>    
                        </div>
                    <br>
                </div>
                <?php endforeach; ?>
    </div>

</div>

<?php
include 'footer.php';
?>  