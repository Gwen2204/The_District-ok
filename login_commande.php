<?php
require('login_script.php');
require_once('header.php');
include_once ('classes/DAO.php');

//on valide toutes les données avant dans une fonction valider_donnees() qui prend en paramètres les données une par une
function valider_donnees($donnees){
  $data = trim($donnees);
  $data = stripcslashes($donnees);
  $data = strip_tags($donnees);

  return $data;
}