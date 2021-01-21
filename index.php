<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/index.css"/>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> 
        <title>DesignWatch</title>
    </head>

    <body>
        <?php include_once("header.php") ?>
        <section>
                            <!-- MIS EN PAGE DE L'ASIDE -->
            <?php include_once("aside.php") ?>
                            <!-- MIS EN PAGE DE L'ARTICLE -->
            <article>
                <div class="img-fond"> 
                    <img src="src/FE_ban.jpg" class="img-acceuil"> 
                </div>
                            <!-- PARTIE HOMME -->
                <hr> 
                    <h1 class="sous-titre">Homme</h1> 
                <hr>
                <div class="bloc-montres">
                    <div class="montre">
                            <img src="src/MASERATI.jpg" class="m"> 
                    </div>
                    <div class="montre">
                        <img src="src/Diesel.jpg" class="m"> 
                    </div>
                    <div class="montre">
                        <img src="src/HugoBoss.jpg" class="m"> 
                    </div>
                    <div class="montre">
                        <img src="src/Lacoste.jpg" class="m"> 
                    </div>
                    <div id="bouton">
                        <a href="produits.php?categorie=Homme"><input type="submit" value="Voir"/></a>
                    </div>
                </div>
                            <!--PARTIE FEMME -->
                <hr> 
                    <h1 class="sous-titre">Femme</h1> 
                <hr>
                <div class="bloc-montres">
                    <div class="montre">
                        <img src="src/Guess.jpg" class="m"> 
                    </div>
                        <div class="montre">
                        <img src="src/Rosefield.jpg" class="m"> 
                    </div>
                    <div class="montre">
                        <img src="src/Fossil.jpg" class="m"> 
                    </div>
                    <div class="montre">
                        <img src="src/Casio.jpg" class="m"> 
                    </div> 
                    <div id="bouton">
                        <a href="produits.php?categorie=Femme"><input type="submit" value="Voir"/></a>
                    </div>
                </div>
                            <!-- PARTIE BRACELET -->
                <hr> 
                    <h1 class="sous-titre">Bracelet</h1> 
                <hr>
                <div class="bloc-montres">
                    <div class="montre">
                        <img src="src/bracelet-maille.jpg" class="m"> 
                    </div>
                        <div class="montre">
                        <img src="src/gourmette.jpg" class="m"> 
                    </div>
                    <div class="montre">
                        <img src="src/br.jpg" class="m"> 
                    </div>
                    <div id="bouton">
                        <a href="produits.php?categorie=Bracelet"><input type="submit" value="Voir"/></a>
                    </div>
                </div>

            </article>
        </section>
                            <!-- FOOTER -->
        <?php include_once("footer.php") ?>
    </body>
</html>