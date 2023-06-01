<?php
include 'header.php';
include_once ('classes/DAO.php');

//var_dump($_POST);
if(isset($_POST["search"])) {
    $search= $_POST["search"];
}
// var_dump ($_POST["search"]);

$tableau = search($search);
// var_dump($tableau);



?>

<div class= "container-fluid">
    <div class="row">

             <?php foreach ($tableau as $search): ?>

                <div class="col-5 mx-6 d-flex justify-content-center mx-6 my-1" style="height: 265px;">        
                                        <a href="plat.detail.php?id=<?= $search->id ?>">   
                                            <img class="p-3" style="height:265px" src="/assets/img/food/<?= $search->image ?>">
                                        </a>  
                                       
                </div>
            <?php endforeach; ?>
        
            



    </div>
</div>