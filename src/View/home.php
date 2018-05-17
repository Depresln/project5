<?php $title  = 'Nicolas Depresles' ?>

<?php ob_start(); ?>
    <?php
        require_once "../vendor/autoload.php";

        echo "Je suis l'accueil";
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
