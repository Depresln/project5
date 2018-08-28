<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    // Navbar
    require '../src/View/navbar.php';

    echo "<br /><br /><br /><br /><br /><br /><p class='text-center'>Vous êtes sur le point de supprimer définitivement un commentaire.</p><br />";

    if (isset($_SESSION['pseudo'])) {
        echo "<div class='text-center'>Supprimer le commentaire ?</div><br />";
        echo '<div class=\'text-center\'><a href="?page=comment.deletion&id=' . $_GET['id'] . '">Oui</a></div>';
        echo '<div class=\'text-center\'><a href="?page=post.show&id=' . $_SESSION['previous'] . '">Non</a></div><br />';
    } else {
        echo 'Vous n\'avez pas les droits suffisants pour supprimer un commentaire.';
    }

    // Footer
    require '../src/View/footer.php';

$content = ob_get_clean();
include('..\src\View\template.php');
