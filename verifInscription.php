<?php
    include_once("varSession.inc.php");

    if(isset($_GET['mail']) && isset($_GET['mdp'])){
        $login = $_GET['mail'];
        $password = $_GET['mdp'];
        $req = "SELECT id, login, password FROM utilisateur where login='".$login."'";
        if(!$result=mysqli_query($id_connexion,$req)){ 
            echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
            exit;
        }else{ 
            //Récuperationdesrésultats 
            $row = mysqli_fetch_row($result);
            if(empty($row)){    // si c'est vide
                // REQUETE POUR INSERER DANS LA BD 
                $req2 = "INSERT INTO utilisateur (login,password) VALUES ('".$login."','".$password."')";
                if(!$result2=mysqli_query($id_connexion,$req2)){ 
                    echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
                    exit;
                }else{ 
                    // REQUETE POUR RECUPERER L'ID
                    $req3 = "SELECT id FROM utilisateur where login='".$login."'";
                    if(!$result3=mysqli_query($id_connexion,$req)){ 
                        echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
                        exit;
                    }else{
                        echo "test";
                        $row2 = mysqli_fetch_row($result3);
                        $_SESSION['login'] = $login;
                        $_SESSION['mdp'] = $password;
                        $_SESSION['id'] = $row2[0];
                        header('Location: panier.php?con=true&login='.$login.'&mdp='.$password.'&id='.$row2[0].'');
                    }
                }
                mysqli_free_result( $result2 );
                mysqli_free_result( $result3 );

            }else{
                header('Location: inscription.php?erreur=1&con=false');
            }
        }
        mysqli_free_result( $result );

    }    
?>