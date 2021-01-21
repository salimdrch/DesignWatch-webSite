<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/produits.css"/>
        <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> 
        <script src="js/script.js"></script>
        <title>Homme</title>
    </head>
    <body>
       <?php 
            include_once("varSession.inc.php");
            if(isset($_POST['refProduit']) && isset($_SESSION['id']) & isset($_POST['qt'])){
                $quantite = $_POST['qt'];
                $idUtilisateur = $_SESSION['id'];
                $refProduit = $_POST['refProduit'];

                // Inserer le produit dans la base donnée 
                $req = "INSERT INTO commande (refProduit,idUtilisateur,quantite) values ('" . $refProduit . "','" . $idUtilisateur . "','" . $quantite . "')";
                if(!$result=mysqli_query($id_connexion,$req)){ 
                    echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
                    exit;
                }
            }
            if(isset($_SESSION['id'])){
                $idUtilisateur = $_SESSION['id'];
                $req2 = "SELECT img,titre,ref,prix,quantite,stock FROM commande NATURAL JOIN produits WHERE commande.refProduit = produits.ref AND commande.idUtilisateur = $idUtilisateur AND commande.valider = 0";
                if(!$result2=mysqli_query($id_connexion,$req2)){ 
                    echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
                    exit;
                }else{
                    $row = mysqli_fetch_all($result2);     
                }
            }   
               
       ?> <!-- Recupere la categorie -->

                            <!-- MIS EN PAGE DU HEADER -->
        <?php include("header.php") ?>
        <section>
                            <!-- MIS EN PAGE DE L'ASIDE -->
            <?php include("aside.php") ?>
                            <!-- MIS EN PAGE DE L'ARTICLE -->
            <article>
                <?php if(isset($_SESSION['login'])): ?>  
                    <h1 class="titre" onmouseover=affiche(this)  onmouseout=normal(this)>Voici votre panier</h1>          
                    <?php if(isset($_SESSION['id']) && !empty($row)): ?>
                        <div class="produits" id="divProduit">
                            <div class="list_art">
                                <?php for($i = 0; $i < count($row); $i++): ?>
                                    <div class="article">
                                        <div class="image">
                                            <?php if(isset($row[$i][0])):?>
                                            <a href="#"><img src="<?php echo($row[$i][0]); ?>"></a>
                                            <?php endif;?>
                                        </div>
                                        <div class="description">
                                            <div class="titre">
                                                <?php if(isset($row[$i][1])):?>
                                                <p class="centre"><?php echo $row[$i][1];?></p>
                                                <?php endif;?>
                                            </div>

                                            <div class="prix">
                                                <?php if(isset($row[$i][2]) || isset($row[$i][3]) ):?>
                                                        <span> <?php echo $row[$i][3] ?> </span> 
                                                        <span><em class="ref">ref : #<?php echo $row[$i][2] ?></em></span>
                                                        <div class="ajout-panier">
                                                            <span><input hidden type="text" value="<?php echo $row[$i][2] ?>" name="refProduit"></span>
                                                            <span><p>Quantite :  <?php echo $row[$i][4] ?></p></span>
                                                            <span><p>Stock :  <?php echo $row[$i][5] ?></p></span>
                                                        </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor;?>
                            </div>
                            <div class="boutton">
                                <div class="bt_vide" onclick="vider(<?php echo $_SESSION['id']; ?>)"><button>Vider</i></button></div>
                                <div class="bt_valide" onclick="valider(<?php echo $_SESSION['id']; ?>)"><button>Valider</i></button></div>
                            </div>
                        </div>
                        
                    <?php else: ?>
                        <div id="produits">
                            <div class="list-ary"> 
                                <p style="font-size:20px">Ton panier est vide !</p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </article>
        </section>
        <!-- FOOTER -->
        <?php include("footer.php") ?>
    </body>
</html>