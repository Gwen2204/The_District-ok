<?php
include 'header.php';
include_once ('classes/DAO.php');
include_once('db.php');

$tableau2 = plat_populaire();

?>

<div class= "container-fluid">
    <div class="row">

             <?php foreach ($tableau2 as $plat_populaire): ?>

                <div class="col-5 mx-6 d-flex justify-content-center mx-6 my-1" style="height: 265px;">        
                                        <a href="plats.php">   
                                            <img class="p-3" style="height:265px" src="/assets/img/food/<?= $plat_populaire->image ?>">
                                      
                                        </a>  
                                       
                </div>
            <?php endforeach; ?>
        
    </div>
</div>