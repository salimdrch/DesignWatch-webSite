<aside>
    <nav class="menu-vertical">
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
            <?php for($i = 0; $i < count($categories); $i++): ?>    
                <li class="m"><a href="produits.php?categorie=<?php echo($categories[$i][0]) ?>"><?php echo($categories[$i][0])?></a></li>
            <?php endfor; ?>
            <li><a href="contact.php"><i class="fas fa-id-badge"></i> Contact</a></li>
        </ul>
    </nav>    
</aside>