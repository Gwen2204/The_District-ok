<?php
class Plat {
  public $_libelleplat;
  public $_imageplat;
  public $_id_categorieplat;
  public $_prixplat;
  public $_descriptionplat;

  public function __construct($libelleplat, $imageplat, $id_categorieplat, $prixplat, $descriptionplat) {
    $this->libelleplat = $libelleplat;
    $this->imageplat = $imageplat;
    $this->id_categorieplat = $id_categorieplat;
    $this->prixplat = $prixplat;
    $this->descriptionplat = $descriptionplat;
  }

  public function afficher() {
    echo $this->libelleplat . " " . $this->imageplat . " : " . $this->id_categorieplat . " (" . $this->prixplat . "€) " . $this->descriptionplat;
  }
}
?>