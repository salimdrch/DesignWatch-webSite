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
            if(isset($_GET['categorie'])){
                $c = $_GET["categorie"];  
                // recupere les produits en fonction de la cateorie
                $req = "SELECT img,titre,ref,prix,stock from produits where categorie='".$c."'";
                if(!$result=mysqli_query($id_connexion,$req)){ 
                    echo "Echec de la requête avec le code d’erreur".mysqli_errno($id_connexion)."\ et le message:".mysqli_error($id_connexion)."<br>"; 
                    exit;
                }else{ 
                    //Récuperationdesrésultats 
                    $produits = mysqli_fetch_all($result);
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
                
                <div class="produits">
                    <?php
                        if($c == 'Homme'){
                            echo '<h1 class="txt" onmouseover=' ."affiche(this)" . 'onmouseout= '. "normal(this)" . '>Watch\'s Men</h1   >';
                        }else if($c == 'Femme'){
                            echo '<h1 class="txt" onmouseover=' ."affiche(this)" . 'onmouseout= '. "normal(this)" . '>Watch\'s Women</h1 >';
                        }else if($c == 'Bracelet'){
                            echo '<h1 class="txt" onmouseover=' ."affiche(this)" . 'onmouseout= '. "normal(this)" . '>Bracelet</h1>';
                        }
                    ?>
                        <div class="list_art">
                            <?php for($i = 0; $i < count($produits); $i++): ?>
                                <div class="article">
                                    <form action="panier.php" method="post">
                                        <div class="image">
                                            <?php if(isset($produits[$i][0])):?>
                                            <a href="#"><img src="<?php echo($produits[$i][0]); ?>"></a>
                                            <?php endif;?>
                                        </div>
                                        <div class="description">
                                            <div class="titre">
                                                <?php if(isset($produits[$i][1])):?>
                                                <p class="centre"><?php echo $produits[$i][1];?></p>
                                                <?php endif;?>
                                            </div>

                                            <div class="prix">
                                                <?php if(isset($produits[$i][2]) || isset($produits[$i][3]) ):?>    
                                                        <span> <?php echo $produits[$i][3] ?> </span> 
                                                        <span><em class="ref">ref : #<?php echo $produits[$i][2] ?></em></span>
                                                        <div class="ajout-panier">
                                                            <span><button type="button" class="btq" id="<?php echo "m_" . $produits[$i][2] . "" ?>" onclick="lessQuantite(id.substring(2))">-</button></span>
                                                            <span><input id="<?php echo "qts_" . $produits[$i][2] . ""?>" type="number" onchange="afficheV(this.value)" value="1" class="qts" name="qt"></span>
                                                            <span><input hidden type="text" value="<?php echo $produits[$i][2] ?>" name="refProduit"></span>
                                                            <span><button type="button" class="btq" id="<?php echo "p_" . $produits[$i][2] . "" ?>" onclick="moreQuantite(id.substring(2) , <?php echo $produits[$i][4] ?>)">+</button></span>
                                                            <span><button id="btE"style="border:none; background-color:white;" type="submit"><img class="panier" src="src/pngwave.png"></button></span> 
                                                        </div>
                                                <?php endif;?>
                                            </div>
                                            <div id="stock">
                                                <?php if(isset($produits[$i][4])):?>
                                                <div class="ss"> 
                                                    <p class="stock" style="display: none;"><?php echo "Stock : " . $produits[$i][4] ?></p>
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endfor;?>
                        </div>
                </div>
                <div class="btS" onclick="afficheStock()"><button>Stock : <i class="fab fa-stack-overflow"></i></button></div>
            </article>
        </section>
        <!-- FOOTER -->
        <?php include("footer.php") ?>
    </body>
</html>