<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    $url = $_GET['id'];
    $_SESSION['previous'] = $url;

    // Navbar
    require '../src/View/navbar.php';

    // Comment successfully added
    if(isset($_SESSION['pseudo'])){
        if(isset($_SESSION['addSuccess']) && $_SESSION['addSuccess'] == "true"){
            echo "<br /><br /><br /><br /><br />Commentaire ajouté avec succès ! En attente de validation...<br /><br />";
            $_SESSION['addSuccess'] = "false";
        }
    }

    // Comment successfully deleted
    if(isset($_SESSION['pseudo'])){
        if(isset($_SESSION['deleteSuccess']) && $_SESSION['deleteSuccess'] == "true"){
            echo "<br /><br /><br /><br /><br />Commentaire supprimé avec succès !<br /><br />";
            $_SESSION['deleteSuccess'] = "false";
        }
    }

    // Post content
    /** @var \App\Entity\Post $post */
    echo "<br /><br /><br /><br /><br /><h2>" . $post->getTitle() . "</h2>de " . $post->getPseudo() . "<br /><br />" . $post->getChapo() . "<br />" . $post->getContent() . "<br /><br />Le " . $post->getDate() . "<br />";

    // Edit post (admin only)
    if(isset($_SESSION['pseudo'])) {
        if ($_SESSION['is_admin'] == TRUE) {
            echo '<br /><a href="?page=post.edit&id=' . $_GET['id'] . '">Editer le post</a>';
        }
    }

    // Add comment (all users)
    if(isset($_SESSION['pseudo'])) {
        echo '<br /><a href="?page=comment.add&id=' . $post->getId() . '">Ajouter un commentaire</a>';
    }

    // Show comments with delete option
    /** @var \App\Entity\Comment $comment */
    foreach ($commentByDate as $comment) {
        echo "<br /><br />" . $comment->getContent();
        if(isset($_SESSION['pseudo'])) {
            if ($_SESSION['id'] == $comment->getAuthor() OR $_SESSION['is_admin'] == TRUE) {
                echo '<br /><a href="?page=comment.delete&id=' . $comment->getIdComment() . '">Supprimer le commentaire</a>';
            }
        }
    }

    // Footer
    require '../src/View/footer.php';

$content = ob_get_clean();
include('..\src\View\template.php');
