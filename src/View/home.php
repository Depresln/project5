<?php
session_start();
$title  = 'Nicolas Depresles';
?>

<?php ob_start(); ?>
    <?php
        require_once "../vendor/autoload.php";

        echo "Je suis l'accueil";

        if(session_status() == PHP_SESSION_NONE) {
            echo "Pas de session";
        } else {
            echo "<br /> Bonjour " . $_SESSION['pseudo'];
        }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
