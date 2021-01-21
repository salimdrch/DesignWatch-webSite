<?php
    include_once("varSession.inc.php");
    /*
    if(isset($_GET['mail']) && $_GET['mdp']){
        $mail = $_GET['mail'];
        $mdp = $_GET['mdp'];

        if($mail !== "" && $mdp !== ""){

            for($j = 0; $j < count($users['user']); $j++){
                if($mail !== $users['user'][$j]['login']  &&  $mdp !== $users['user'][$j]['password'] ){
                    header('Location: connexion.php?erreur=1&con=false&mdp='.$mdp);                        
                }
            }

            for($i = 0; $i < count($users['user']); $i++){
                if($mail == $users['user'][$i]['login'] && $mdp == $users['user'][$i]['password']){
                    $_SESSION['login'] = $mail;
                    $_SESSION['mdp'] = $mdp;
                    $_SESSION['id'] = $i;
                    header('Location: connexion.php?con=true');
                }
            }

        }else{
            header('Location: connexion.php?erreur=2&con=false');
        }
    }else{
        header('Location: connexion.php?');
    } */
    
    if(isset($_GET['mail']) && isset($_GET['mdp'])){
        $login = $_GET['mail'];
        $password = $_GET['mdp'];
        $req = "SELECT id, login, password FROM utilisateur where login='".$login."' and password='".$password."'";
        if(!$result=mysqli_query($id_connexion,$req)){ 
            echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
            exit;
        }else{ 
            //Récuperationdesrésultats 
            $row = mysqli_fetch_row($result);
            if(empty($row)){    // si c'est vide
                header('Location: connexion.php?erreur=1&con=false');
            }else{
                $_SESSION['login'] = $login;
                $_SESSION['mdp'] = $password;
                $_SESSION['id'] = $row[0];
                header('Location: panier.php?con=true&login='.$login.'&mdp='.$password.'&id='.$row[0]);
                echo "est dans la dataBase";
            }
        }
        mysqli_free_result( $result );
    }
    
?>