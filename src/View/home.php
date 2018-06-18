<?php
    session_start();
    $title  = 'Nicolas Depresles';
?>

<?php ob_start(); ?>
    <?php
        require_once "../vendor/autoload.php";

        if(isset($_SESSION['pseudo'])) {
            echo "Bonjour " . $_SESSION['pseudo'] . "<br /><a href='?page=authentication.logout'>Se déconnecter.</a> ";
        } else {
            echo "Je suis l'accueil<br /> <a href='?page=authentication.login'>Se connecter.</a>";
        }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
