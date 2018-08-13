<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    echo "Je suis un commentaire d'id " . $_GET['id'] . "<br />";

    if (isset($_SESSION['pseudo'])) {
        echo 'Supprimer le commentaire ?<br />';
        echo '<a href="?page=comment.deletion&id=' . $_GET['id'] . '">Oui</a><br />';
        echo '<a href="?page=post.show&id=' . $_GET['id'] . '">Non</a>';
    } else {
        echo 'Vous n\'avez pas les droits suffisants pour supprimer un commentaire.';
    }

$content = ob_get_clean();

include('..\src\View\template.php');
