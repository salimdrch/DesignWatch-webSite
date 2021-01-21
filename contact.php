<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/contact.css"/>
        <script src="js/script.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> 
        <title>Contact</title>
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
                    <h2>Contact</h2>
                    <nav class="infos">
                        <ul>
                            <li><a href="#"><i class="fas fa-map-marker-alt"></i> Guynemer, 93200 Saint-Denis</a></li>
                            <li><a href="#"><i class="fas fa-at"></i> salim.drch@gmail.com</a></li>
                            <li><a href="#"><i class="fas fa-mobile-alt"></i> +33 06 59 23 29 04</a></li>
                        </ul>
                    </nav>
                    <nav class="menu-reseaux-article">
                        <ul>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li class="brd"><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li class="brd"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="brd"><a href="#"><i class="fab fa-twitter"></i></a></li> 
                        </ul>
                </div>
                <!-- Formulaire --> 
                <!-- METTRE DANS LE FORMULAIRE JAVASCRIPT ->onsubmit="return envoyer_form()" -->

                <div class="envoyer-message">      
                    <form method="POST" action="contact.php">
                        <h2 class="ss">Envoyer un Message</h2>
                        <div id="sendForm">
                            <!--------------------------------------------------- VERIFNOM --------------------------------------------------->
                            <?php if(isset($_POST['nom']) && preg_match("#^[A-Za-z]{1,10}$#",$_POST['nom'])): ?>
                                <div class="forme">
                                        <input type="text" id="nom" name="nom" class="firstname" placeholder="nom" value="<?php echo $_POST['nom']?>" > <!--  onchange="checkName(this.value)" <label id="vName">Votre Nom est pas correct</label> -->  
                                </div>
                            <?php else:?>
                                <div style="border-bottom: 1px solid red" class="forme">                              
                                    <input type="text" id="nom" name="nom" class="firstname" placeholder="nom"> <!--  onchange="checkName(this.value)"  -->    
                                    <label id="vName">Votre Nom est pas correct</label>
                                </div>
                            <?php endif;?>

                            <!--------------------------------------------------- VERIFPRENOM --------------------------------------------------->
                            <?php if(isset($_POST['prenom']) && preg_match("#^[A-Za-z]{1,10}$#",$_POST['prenom'])): ?>
                                <div class="forme">
                                    <input type="text" id="prenom" name="prenom" class="name" placeholder="prenom" value="<?php echo $_POST['prenom']?>" > <!-- onchange="checkFirstName(this.value)" <label id="vFirstName">Votre Prenom est correct</label> -->
                                </div>
                            <?php else:?>
                                <div style="border-bottom: 1px solid red" class="forme">
                                    <input type="text" id="prenom" name="prenom" class="name" placeholder="prenom"> <!-- onchange="checkFirstName(this.value)" <label id="vFirstName">Votre Prenom est pas correct</label> -->    
                                </div>
                            <?php endif;?>

                            <!--------------------------------------------------- VERIFMAIL --------------------------------------------------->
                            <?php if(isset($_POST['email']) && preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/",$_POST['email'])): ?>
                                <div class="forme">
                                    <input type="text" id="mail" name="email" class="email" placeholder="email" value="<?php echo $_POST['email']?>" > <!-- onchange="checkMail(this.value)" <label id="vMail">Votre Email est correct</label> -->                                    
                                </div>
                            <?php else:?>
                                <div style="border-bottom: 1px solid red" class="forme">
                                    <input type="text" id="mail" name="email" class="email" placeholder="email"> <!-- onchange="checkMail(this.value)"  <label id="vMail">Votre Email est pas correct</label>  -->  
                                </div>
                            <?php endif;?>

                            <div class="metiers">
                                <p>Métier :</p>
                                <input type="radio" name="metier" class="tec">
                                <label for="tec">Technicien</label> 
                                <input type="radio" name="metier" class="ca">
                                <label for="ca">Cadre</label>         
                                <input type="radio" name="metier" class="gr">
                                <label for="gr">Gérant</label>                 
                            </div>
                            <?php if(isset($_POST['date']) && preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/",$_POST['date'])): ?>
                                <div class="dateN">
                                    <label for="date">Date de naissance :</label>
                                    <input type="date" id="date" class="date" name="date" value="<?php echo $_POST['date'] ?>"> <!--  onchange="checkDate(this.value)" -->
                                    <label id="vDate" style="display: none;"></label>
                                </div>
                            <?php else: ?>
                                <div class="dateN">
                                    <label for="date">Date de naissance :</label>
                                    <input type="date" id="date" class="date" name="date"  style="border: 1px solid red"> <!--  onchange="checkDate(this.value)" -->
                                    <label id="vDate" style="color: black">C'est pas bon</label>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($_POST['sujet']) && preg_match("/.{5,}/",$_POST['sujet'])): ?>                            
                                <div class="forme">
                                    <input type="text" id="s" name="sujet" class="sujet" placeholder="sujet" value="<?php echo $_POST['sujet']?>"> <!-- onchange="checkMessage(this.value)" -->
                                    <label id="vSujet" style="display: none;"></label>        
                                </div>
                            <?php else: ?>
                                <div class="forme" style="border-bottom: 1px solid red">
                                    <input type="text" id="s" name="sujet" class="sujet"  placeholder="sujet"> <!-- onchange="checkMessage(this.value)" -->
                                    <label id="vSujet" style="display: none;"></label>        
                                </div>
                            <?php endif; ?>

                            <div class="forme">
                                <input type="text" id="m" name="message" class="message"  placeholder="message"> <!-- onchange="checkMessage(this.value)" -->
                                <label id="vMessage" style="display: none;"></label>        
                            </div> 
                    
                            <div class="inputBox">
                                <input type="submit" name="" value="Envoyé">
                                <?php if(isset($_POST['nom']) && preg_match("#^[A-Za-z]{1,10}$#",$_POST['nom']) && 
                                        isset($_POST['prenom']) && preg_match("#^[A-Za-z]{1,10}$#",$_POST['prenom']) &&
                                        isset($_POST['email']) && preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/",$_POST['email']) &&
                                        isset($_POST['date']) && preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/",$_POST['date']) &&
                                        isset($_POST['sujet']) && preg_match("/.{5,}/",$_POST['sujet']) && 
                                        isset($_POST['message']) && preg_match("/^[A-Za-z1-9]+$/",$_POST['sujet'])): ?>
                                    <?php 
                                        $mail =  $_POST['email'];
                                        $sujet = $_POST['sujet'];
                                        $message = $_POST['message'];
                                        $headers = "From: salim.drch@gmail.com"; ?>
                                   
                                   <?php if (mail($mail, $sujet, $message, $headers)): ?>
                                        <span id="vEnvoye" style="color: white">Email envoyé avec succès à <?php echo $mail?> ...</span>    
                                    <?php else: ?>
                                        <span id="vEnvoye" style="color: white">Échec de l'envoi de <?php echo $mail?> ...</span>
                                    <?php endif;?>

                                <?php else: ?>
                                    <span id="vEnvoye" style="color: white">Échec de l'envoi </span>    
                                <?php endif; ?>
                                
                            </div> 
                        </div>
                    </form>
                </div>

            </article>
        </section>
        <!-- FOOTER -->
        <?php include("footer.php") ?>
    </body>
</html>