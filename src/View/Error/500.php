<?php
$title  = 'Nicolas Depresles';
ob_start();

    echo "Erreur 500 - Problème interne avec le serveur.";
    echo $messageException;

$content = ob_get_clean();
include('..\src\View\template.php');
