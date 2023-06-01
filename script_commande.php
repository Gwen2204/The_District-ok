<?php
session_start();
require_once('header.php');
include_once ('classes/DAO.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';


//var_dump($_POST);
if(isset($_POST["nom"])) {
    $nom= $_POST["nom"];
}

if(isset($_POST["prenom"])) {
    $prenom= $_POST["prenom"];
}

if(isset($_POST["adresse"])) {
    $adresse= $_POST["adresse"];
}

if(isset($_POST["cp"])) {
    $cp= $_POST["cp"];
}

if(isset($_POST["ville"])) {
    $ville= $_POST["ville"];
}

if(isset($_POST["tel"])) {
    $tel= $_POST["tel"];
}

if(isset($_POST["email"])) {
    $email= $_POST["email"];
}



$prix=$_POST["prix"];
$libelle=$_POST["libelle"];

$db=connexionBase();


try{
//var_dump ($_POST, $total, $date_commande, $adresse_complete);
//infos pas saisies par l'utilisateur
$total = $prix*$quantity;
$date_commande = date("Y-m-d H:i:s");
$nom_client = $nom . "," . $prenom;
$etat = "En cours";
$adresse_complete = $adresse . ", " . $cp . ", ". $ville;
$plat_id=$_POST["plat_id"];
$quantity=$_POST["quantite"];


$requete = $db->prepare("INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) 
VALUES (:id_plat, :quantite, :total, :date_commande, :etat, :nom_client, :telephone_client, :email, :adresse_client )");

                $requete->bindParam(':id_plat', $plat_id, PDO::PARAM_STR);
                $requete->bindParam(':quantite', $quantity, PDO::PARAM_STR);
                $requete->bindParam(':total', $total, PDO::PARAM_STR);
                $requete->bindParam(':date_commande', $date_commande, PDO::PARAM_STR);
                $requete->bindParam(':etat', $etat, PDO::PARAM_STR);
                $requete->bindParam(':nom_client', $nom_client, PDO::PARAM_STR);
                $requete->bindParam(':telephone_client', $tel, PDO::PARAM_STR);
                $requete->bindParam(':email', $email, PDO::PARAM_STR);
                $requete->bindParam(':adresse_client', $adresse_complete, PDO::PARAM_STR);

                $requete->execute();
                $requete->closeCursor();


            
                
                $mail = new PHPMailer(true);
                
                // On va utiliser le SMTP
                $mail->isSMTP();
                
                // On configure l'adresse du serveur SMTP
                $mail->Host       = 'localhost';    
                
                // On désactive l'authentification SMTP
                $mail->SMTPAuth   = false;    
                
                // On configure le port SMTP (MailHog)
                $mail->Port       = 1025;                                   
                
                // Expéditeur du mail - adresse mail + nom (facultatif)
                $mail->setFrom('from@thedistrict.com', 'The District Company');
                
                // Destinataire(s) - adresse et nom (facultatif)
                $mail->addAddress("client1@example.com", $nom_client);
                $mail->addAddress("client2@example.com"); 
                
                //Adresse de reply (facultatif)
                $mail->addReplyTo("reply@thedistrict.com", "Reply");
                
                //CC & BCC
                //$mail->addCC("cc@example.com");
                //$mail->addBCC("bcc@example.com");
                
                // On précise si l'on veut envoyer un email sous format HTML 
                $mail->isHTML(true);
                
                //On ajoute la/les pièce(s) jointe(s)
                //$mail->addAttachment('/path/to/file.pdf');
                
                // Sujet du mail
                $mail->Subject = 'Détail de votre commande';
                
                // Corps du message
                $mail->Body = $etat . "," . $plat_id . "," . $libelle . "," . $quantity . "," . $total . "," . $date_commande;
                
                
                // On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
                if ($mail){
                    try {
                        $mail->send();
                        $_SESSION["confirmation_commande"]= "Merci " . $nom_client . ", un mail de confirmation vient de vous être envoyé" ;
                        header ("Location: accueil.php");
                        } catch (Exception $e) {
                        $_SESSION["commande_non"]= "L'envoi de mail a échoué. L'erreur suivante s'est produite : " . $mail->ErrorInfo;
                        header ("Location: accueil.php");
                        }
                    }
            

}

catch(Exception $e){
//var_dump ($requete->queryString); 
//var_dump ($requete->errorInfo());

echo "Erreur: " . $requete->errorInfo()[2] . "<br>";
die("Fin du script (script_commande.php)");

}


include 'footer.php';
?>  