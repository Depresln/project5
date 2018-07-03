<?php
    session_start();
    $title  = 'Nicolas Depresles';
    ob_start();

    echo "Je suis un post d'id " . $_GET['id'] . "<br />";

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            echo "Supprimer le post ?<br />";
            echo "<a href='?page=post.deletion&id=" . $_GET['id'] . "'>Oui</a><br />";
            echo "<a href='?page=post.index'>Non</a>";
        }
    }
    $content = ob_get_clean();

include('..\src\View\template.php');