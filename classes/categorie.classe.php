<?php

class Categorie {
  public $_libelle;
  public $_image;
  public $_id_categorie;

  public function __construct($libelle, $image, $id_categorie) {
    $this->libelle = $libelle;
    $this->image = $image;
    $this->id_categorie = $id_categorie;
  }

  public function afficher() {
    echo $this->libelle . " " . $this->image . " : " . $this->id_categorie;
  }

}

?>