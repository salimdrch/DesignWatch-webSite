<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
/*
    $file = "produits.json";
    $data = file_get_contents($file,true);
    $_SESSION['categories'] = json_decode($data,true);
    $categories = $_SESSION['categories'];
    
    $chemin = "utilisateurs.xml";
    $xmlfile = file_get_contents($chemin);
    $objet = simplexml_load_string($xmlfile);
    $jsonConvert = json_encode($objet);
    $_SESSION["users"] = json_decode($jsonConvert,true);
    $users = $_SESSION["users"]; 
    
      METTRE LES INSERT DANS UN FICHIER SQL  
    $fileInput = "produits.sql";
    for($i = 1; $i <= count($categories['Homme']); $i++){
        $req = "INSERT INTO produits (categorie,img,titre,ref,prix,stock) VALUES ('Homme','".$categories['Homme']['m'.$i]['image']."','".$categories['Homme']['m'.$i]['titre']."','".$categories['Homme']['m'.$i]['ref']."','".$categories['Homme']['m'.$i]['prix']."','".$categories['Homme']['m'.$i]['stock']."'); \n";
        file_put_contents($fileInput, $req, FILE_APPEND | LOCK_EX);
    }
    for($j = 1; $j <= count($categories['Femme']); $j++){
        $req = "INSERT INTO produits (categorie,img,titre,ref,prix,stock) VALUES ('Femme','".$categories['Femme']['m'.$j]['image']."','".$categories['Femme']['m'.$j]['titre']."','".$categories['Femme']['m'.$j]['ref']."','".$categories['Femme']['m'.$j]['prix']."','".$categories['Femme']['m'.$j]['stock']."'); \n";
        file_put_contents($fileInput, $req, FILE_APPEND | LOCK_EX);
    }
    for($j = 1; $j <= count($categories['Bracelet']); $j++){
       $req = "INSERT INTO produits (categorie,img,titre,ref,prix,stock) VALUES ('Bracelet','".$categories['Bracelet']['m'.$j]['image']."','".$categories['Bracelet']['m'.$j]['titre']."','".$categories['Bracelet']['m'.$j]['ref']."','".$categories['Bracelet']['m'.$j]['prix']."','".$categories['Bracelet']['m'.$j]['stock']."'); \n";
       file_put_contents($fileInput, $req, FILE_APPEND | LOCK_EX);
    } 
*/

    // connexion_data.inc.php 
    $host="localhost"; // adresse/nom du serveur, localhost par défaut 
    $port=3306; // port de connexionau serveur 
    $user="root";  // login utilisateur 
    $password="";    // mot de passe utilisateur 
    $db="mabase";   // base de donnéesà utiliser 

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
        $_SESSION['categories'] = $categories; 
    }

    
?>