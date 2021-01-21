<?php 
    include("varSession.inc.php");
    $id = $_GET['id'];
    $req = "DELETE FROM commande WHERE idUtilisateur = '" . $id . "'";
    if(!$result=mysqli_query($id_connexion,$req)){ 
        echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
        exit;
    }else{
        $req2 = "SELECT * FROM commande WHERE idUtilisateur = '" . $id . "'";
        if(!$result2=mysqli_query($id_connexion,$req2)){ 
            echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
            exit;
        }
        $row = mysqli_fetch_all($result2);
        if(empty($row)){
            echo "<p style='font-size:20px' >Ton panier est vide !</p>";
        }else{
            echo "c'est pas vide";
        }
    }

?>