<?php
    session_start();
    $title  = 'Nicolas Depresles';
    ob_start();
?>

<h2>Post List</h2>

<?php
    /** @var \App\Entity\Post $post */
    foreach ($postList as $post) {
        echo "<a href='?page=post.show&id=" . $post->getId() . "'>" . $post->getTitle() . "</a> ";
        echo $post->getDate() . "<br />";
        echo $post->getChapo() . "<br /><br />";
    }

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            echo "Ajouter un post";
        } else {
            echo "Vous n'avez aucun droit";
        }
    }

    $content = ob_get_clean();

    include('..\src\View\template.php');
?>