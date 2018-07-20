<?php
    session_start();
    $title  = 'Nicolas Depresles';
    ob_start();
?>

<h2>Post List</h2>

<?php
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['deleteSuccess']) && $_SESSION['deleteSuccess'] == "true"){
                echo "Suppression effectuée avec succès !<br /><br />";
                $_SESSION['deleteSuccess'] = "false";
            }
        }
    }

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['addSuccess']) && $_SESSION['addSuccess'] == "true"){
                echo "Post ajouté avec succès !<br /><br />";
                $_SESSION['addSuccess'] = "false";
            }
        }
    }

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['editSuccess']) && $_SESSION['editSuccess'] == "true"){
                echo "Post edité avec succès !<br /><br />";
                $_SESSION['editSuccess'] = "false";
            }
        }
    }

    /** @var \App\Entity\Post $post */
    foreach ($postList as $post) {
        echo "<a href='?page=post.show&id=" . $post->getId() . "'>" . $post->getTitle() . "</a> ";
        echo $post->getDate() . "<br />";
        echo $post->getChapo() . "<br />";
        if(isset($_SESSION['pseudo'])) {
            if ($_SESSION['is_admin'] == TRUE) {
                echo "<a href='?page=post.delete&id=" . $post->getId() . "'>Supprimer le post</a><br /><br />";
            }
        }
    }

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            echo "<a href='?page=post.create'>Ajouter un post</a>";
        }
    }

    $content = ob_get_clean();

    include('..\src\View\template.php');
?>