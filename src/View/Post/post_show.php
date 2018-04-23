<?php $title  = 'Nicolas Depresles' ?>

<?php ob_start(); ?>
<?php

echo "Je suis un blogpost";
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>