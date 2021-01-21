<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/connexion.css"/>
        <script src="js/script.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> 
        <title>Connexion</title>
    </head>
    <body>
                           <!-- MIS EN PAGE DU HEADER -->
        <?php include("header.php") ?>
        <section>
                            <!-- MIS EN PAGE DE L'ASIDE -->
            <?php include("aside.php") ?>
                            <!-- MIS EN PAGE DE L'ARTICLE -->
            <article>
                <div class="bloc-infos">
                    <h2>Inscription</h2>
                    <form method="GET" action="verifInscription.php">
                        <span class="affichC"><label>Adresse mail*</label></span>
                        <span class="affichC"><input type="text" class="mail" name="mail" class="mail" placeholder="Adresse mail" required></span>
                        <span class="affichC"><label>Mot de passe*</label></span>
                        <span class="affichC"><input type="password" class="mdp" name="mdp" class="mdp" placeholder="Mot de passe" required></span>
                        <span class="affich"><input class="envoyer" type="submit" value="Inscription" ></span>
                        <?php if(isset($_GET['erreur'])){
                            $erreur = $_GET['erreur'];
                            if($erreur == 1 || $erreur == 2){
                                echo "<span class='affichC'><label style='color:red'>Veuiller saisir un mail ou mdp correct</label></span>";
                            }
                        }?>
                    </form>
                </div>
                </table>                   
            </article>
        </section>
        <!-- FOOTER -->
        <?php include("footer.php") ?>
    </body>
</html>