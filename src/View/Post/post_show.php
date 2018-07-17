<?php
    session_start();
    $title  = 'Nicolas Depresles';
    ob_start();

    if(isset($_SESSION['pseudo'])){
        if(isset($_SESSION['addSuccess']) && $_SESSION['addSuccess'] == "true"){
            echo "Commentaire ajouté avec succès !<br /><br />";
            $_SESSION['addSuccess'] = "false";
        }
    }

    /** @var \App\Entity\Post $post */
    echo "<h2>" . $post->getTitle() . "</h2><br />Je suis un post d'id " . $post->getId() . " créé le " . $post->getDate() . "<br /><br />" . $post->getContent();

    if(isset($_SESSION['pseudo'])) {
        if ($_SESSION['is_admin'] == TRUE) {
            echo '<br /><a href="?page=post.edit&id=' . $post->getId() . '">Editer le post</a>';
        }
    }

    if(isset($_SESSION['pseudo'])) {
        echo '<br /><a href="?page=comment.add&id=' . $post->getId() . '">Ajouter un commentaire</a>';
    }

    /** @var \App\Entity\Comment $comment */
    foreach ($commentByDate as $comment) {
        echo "<br /><br />" . $comment->getContent();
        if(isset($_SESSION['pseudo'])) {
            if ($_SESSION['is_admin'] == TRUE) {
                echo '<br /><a href="?page=comment.delete&id=' . $comment->getIdComment() . '">Supprimer le commentaire</a>';
            }
        }
    }



    $content = ob_get_clean();

    include('..\src\View\template.php');
?>
