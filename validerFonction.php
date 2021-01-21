<?php 
    include("varSession.inc.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $req = "SELECT ref,stock FROM produits NATURAL JOIN commande WHERE produits.ref = commande.refProduit AND commande.idUtilisateur = '".$id."' AND commande.valider=0";
        if($result=mysqli_query($id_connexion,$req)){
            // recupere la ref et le stock des produits de l'utilisateur   
            $row = mysqli_fetch_all($result);
            if(empty($row)){
                echo "Le panier est vide !";
                exit;
            }else{
                for($i = 0; $i < count($row); $i++){
                    $req2 = "SELECT quantite FROM `commande` WHERE commande.refProduit = '". $row[$i][0] ."' AND commande.quantite <= '" . $row[$i][1] . "' AND commande.valider=0";
                    if($result2=mysqli_query($id_connexion,$req2)){ 
                        // Pour chacun des produits on va recuperer sa quantité si elle est inferieur au stock 
                        $row2 = mysqli_fetch_row($result2);
                        if(empty($row2)){
                            echo "<p>La quantité saisie est superieur au stock ! <br> Veuillez saisir une quantite equivalent au stock !</p>";
                            exit;
                        }else{
                            $r = intval($row[$i][1]) - $row2[0];
                            // Met a jour le stock des produits
                            $req3 = "UPDATE produits SET produits.stock = '" . $r ."' WHERE ref = '" . $row[$i][0] . "'";
                            $result2=mysqli_query($id_connexion,$req3); 
                            // Met a jour la commande 
                            $req4 = "UPDATE commande SET commande.valider = 1 WHERE refProduit = '" . $row[$i][0] . "'";
                            $result3=mysqli_query($id_connexion,$req4);
                        }
                    }
                }  
            }
        }

       /* $req5 = "SELECT SUM(quantite) FROM commande WHERE commande.valider = 1 AND commande.idUtilisateur = '".$id."' ";
        $result4 = mysqli_query($id_connexion,$req5);
        $row3 = mysqli_fetch_row($result4);
        if(!empty($row3)){
            echo "<p>Vous avez acheté pour un montant de " . $row3[0] . " $ <br></p>"; */
            echo "<p>La commande est validé ! Vous serez rediriger dans une nouvelle page afin de proceder au réglement... </p>";
    //    }
    }
?>