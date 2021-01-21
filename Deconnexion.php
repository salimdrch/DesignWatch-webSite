
<?php require('varSession.inc.php');
    session_destroy();
    header('Location: connexion.php');
?>