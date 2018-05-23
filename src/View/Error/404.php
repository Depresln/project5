<?php
    $title  = 'Nicolas Depresles';
    ob_start();

    echo "Erreur 404 - La page demandée n'existe pas.";

    $content = ob_get_clean();

include('..\src\View\template.php');
