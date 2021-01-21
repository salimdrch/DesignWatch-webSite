<?php 
    include_once("connexion_data.inc.php");
    // Connexion à mysql 
    if(!($id_connexion=mysqli_connect($host,$user,$password))){ 
        echo"La connexion a renvoyé une erreur de code".mysqli_errno($id_connexion)."avec le\ message:".mysqli_error($id_connexion)."<br>"; 
        exit; 
    }
    // Connexion à la base 
    if(!mysqli_select_db($id_connexion,$db)){ 
        echo"La connexion à la base a renvoyé une erreur de code".mysqli_errno($id_connexion)."\ avec le message:".mysqli_error($id_connexion)."<br>"; 
        exit;
    }

    // Recuperer les cate
    $req = "SELECT DISTINCT categorie from produits";
    if(!$result=mysqli_query($id_connexion,$req)){ 
        echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
        exit;
    }else{ 
        //Récuperationdesrésultats 
        $categories = mysqli_fetch_all($result);
        //        $_SESSION['categories'] = $categories; 
    }

?>