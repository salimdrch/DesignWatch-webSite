<header>
    <?php include("varSession.inc.php") ?>
    <label class="logo">DesignWatch</label>
    <ul class="haut">
    <?php if(!isset($_SESSION['login'])): ?>
        <li class="b"><a href="connexion.php"><i class="far fa-user-circle"></i> Connexion</a></li>
        <li><a href="inscription.php"><i class="far fa-user"></i> Creer compte</a></li>
    <?php else: ?>
        <li class="b"><a href="deconnexion.php"><i class="far fa-user-circle"></i> Deconnexion</a></li>
    <?php endif; ?>
    </ul>
    <nav class="menu">
        <ul>
            <li class="m"><a href="index.php">Accueil</a></li>
            <?php for($i = 0; $i < count($categories); $i++): ?>    
                <li class="m"><a href="produits.php?categorie=<?php echo($categories[$i][0]) ?>"><?php echo($categories[$i][0])?></a></li>
            <?php endfor; ?>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="#"><i class="far fa-heart"></i></a></li>
            <?php if(!isset($_SESSION['login'])): ?>
                <li><a href="connexion.php"><img class="panier" src="../site/src/pngwave.png"></a></li>
            <?php else: ?>
                <li><a href="panier.php"><img class="panier" src="../site/src/pngwave.png"></a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>


