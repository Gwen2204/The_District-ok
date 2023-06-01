<?php 

include_once('db.php');

function acc_categorie(){

$db = connexionBase();
$query = $db-> query ('SELECT * FROM categorie WHERE LOWER(active)="yes" LIMIT 6');
$tab = $query->fetchALL(PDO::FETCH_OBJ);
$query->closeCursor();
return $tab;

}

        function p_plat(){

            $db = connexionBase();
            $query = $db-> query ('SELECT * FROM plat WHERE LOWER(active)="yes"');
            $tab = $query->fetchALL(PDO::FETCH_OBJ);
            $query->closeCursor();
            return $tab;
    
        }



        function plat_populaire(){

            $db = connexionBase();
            $query = $db-> query ('SELECT *, plat.id as id FROM plat 
            left JOIN commande ON commande.id_plat = plat.id
            GROUP BY plat.id
            ORDER BY sum(commande.quantite)
            DESC
            Limit 3');
            $tab = $query->fetchALL(PDO::FETCH_OBJ);
            $query->closeCursor();
            return $tab;
        
    
        }

        function plat_categorie(){

            $db = connexionBase();
            $query = $db-> query ('SELECT * FROM categorie LIMIT 8');
            $tab = $query->fetchALL(PDO::FETCH_OBJ);
            $query->closeCursor();
            return $tab;
            
           
        }
        

        function plat_detail($plat_id){
            
            $db = connexionBase();
            $requete = ('SELECT * FROM plat WHERE id = :id');
            $requete2 = $db-> prepare ($requete);
            $requete2 -> execute([':id' => $plat_id]);
            $tab = $requete2->fetchAll(PDO::FETCH_OBJ);
            
            return $tab;
            
            

        }


        function plat_cat($cat_id){
            
            $db = connexionBase();
            $requete = ('SELECT * FROM plat WHERE id_categorie = :id_categorie');
            $requete2 = $db-> prepare ($requete);
            $requete2 -> execute([':id_categorie' => $cat_id]);
            $tab = $requete2->fetchAll(PDO::FETCH_OBJ);
            
            return $tab;
            
            

        }

     
        function search($search){
            $db = connexionBase();
            $val1 = '%'. $search .'%';
            $val2 = '%'. $search .'%';
            $requete = $db-> prepare('SELECT *  
                                    FROM plat WHERE description LIKE :val1 OR libelle LIKE :val2 AND active= "YES";');
            $requete -> bindParam(':val1', $val1);
            $requete ->bindParam(':val2', $val2);
            $requete -> execute();
            $tab = $requete ->fetchALL(PDO::FETCH_OBJ);
            $requete->closecursor();
            
            return $tab;
        }


        


        function creerUtilisateur($username, $email, $password){
            try{
                $pdo = connexionBase();
                $pdo->beginTransaction();

                $requete = $pdo->prepare("INSERT INTO utilisateur (nom_prenom, email, password) VALUES (:username, :email, :password)");
                $username = $username;
                $email = $email;
                $password = $password;
                $requete->bindParam(':username', $username, PDO::PARAM_STR);
                $requete->bindParam(':email', $email, PDO::PARAM_STR);
                $requete->bindParam(':password', $password, PDO::PARAM_STR);
                $requete->execute();

                $pdo->commit();

                $reponse = "OK";
                return $reponse;

            }
            catch(PDOException $e){
                $pdo->rollback();
                echo "Erreur : Une erreur est survenue. Veuillez recommencer!";
                $reponse = "NON";
                return $reponse;

            }
           
        }  





//----------------------Commande-------------------------

        function creer_commande ($id_plat , $quantite, $date_commande, $total, $nom_client, $telephone_client, $email_client, $adresse_client){

            $etat= "En préparation";
            $db = connexionBase();
            $query = $db -> prepare('INSERT INTO commande (id_plat, quantite, date_commande, total, nom_client, telephone_client, email_client, adresse_client, etat) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');
            $query -> execute([$id_plat, $quantite, $date_commande, $total, $nom_client, $telephone_client, $email_client, $adresse_client]);
            $query-> closeCursor;
            return true;
        }


        function toutes_les_commandes(){
            $db = connexionBase();
            $query = $db-> query('SELECT * FROM commande');
            $query-> execute();
            $tab = $query->fetchAll(PDO::FETCH_OBJ);
            $query->closeCursor();
            return $tab;
        }


        function update_commande($id_plat, $quantite, $date_commande, $total, $nom_client, $telephone_client, $email_client, $adresse_client){
            $db = connexionBase();
            $query = $db->prepare("UPDATE commande SET 
            id_plat= :id_plat,
            quantite= :quantite,
            date_commande= :date_commande,
            total = :total,
            nom_client= :nom_client,
            telephone_client = :telephone_client,
            email_client= :email_client,
            adresse_client= :adresse_client
            WHERE id_commande= :id_commande");

            $query->bindValue(':id_plat', $id_plat, PDO::PARAM_STR);
            $query->bindValue(':quantite', $quantite, PDO::PARAM_STR);
            $query->bindValue(':date_commande', $date_commande, PDO::PARAM_STR);
            $query->bindValue(':total', $total, PDO::PARAM_STR);
            $query->bindValue(':nom_client', $nom_client, PDO::PARAM_STR);
            $query->bindValue(':telephone_client', $telephone_client, PDO::PARAM_STR);
            $query->bindValue(':email_commande', $email_commande, PDO::PARAM_STR);
            $query->bindValue(':adresse_client', $adresse_client, PDO::PARAM_STR);
            $query->bindValue(':id_commande', $id_commande, PDO::PARAM_STR);

            $query->execute();
            $query->closeCursor();
        }


        function delete_commande($id){
            $db = connexionBase();
            $query = $db-> prepare('DELETE * FROM commande WHERE id_commande=?;');
            $query-> execute(array($id));
            $tab = $query->fetchAll(PDO::FETCH_OBJ);
            $query->closeCursor();
            return $tab;
        }






?>