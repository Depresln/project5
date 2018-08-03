<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    if(isset($_SESSION['pseudo'])) {
        if ($_SESSION['is_admin'] == TRUE) {
            /** @var \App\Entity\Comment $comment */
            foreach ($commentList as $comment) {
                echo $comment->getContent();
                echo '<br /><a href="?page=comment.validate&id=' . $comment->getIdComment() . '">Valider le commentaire</a><br  />';
                echo '<a href="?page=comment.delete&id=' . $comment->getIdComment() . '">Refuser le commentaire</a><br /><br />';
            }
        } else {
            echo "Erreur 404 - La page demandée n'existe pas.";
        }
    } else {
        echo "Erreur 404 - La page demandée n'existe pas.";
    }

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            echo "<a href='?page=post.index'>Retour au blog</a><br /><br />";
        }
    }

$content = ob_get_clean();

include('..\src\View\template.php');
?>
