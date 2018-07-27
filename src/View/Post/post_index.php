<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    // Navbar
    require '../src/View/navbar.php';

    echo '<br /><br /><br /><br /><br /><h2>Post List</h2>';

    // Message for post deletion successful
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['deleteSuccess']) && $_SESSION['deleteSuccess'] == "true"){
                echo "Suppression effectuée avec succès !<br /><br />";
                $_SESSION['deleteSuccess'] = "false";
            }
        }
    }

    // Message for post addition successful
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['addSuccess']) && $_SESSION['addSuccess'] == "true"){
                echo "Post ajouté avec succès !<br /><br />";
                $_SESSION['addSuccess'] = "false";
            }
        }
    }

    // Message for post edition successful
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['editSuccess']) && $_SESSION['editSuccess'] == "true"){
                echo "Post edité avec succès !<br /><br />";
                $_SESSION['editSuccess'] = "false";
            }
        }
    }

    // Post index
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

    // Add a post
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            echo "<a href='?page=post.create'>Ajouter un post</a><br /><br />";
        }
    }

    // Espace admin
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            echo "<a href='?page=post.administration'>Accéder à l'espace administrateur</a><br /><br />";
        }
    }

    // Footer
    require '../src/View/footer.php';

$content = ob_get_clean();
include('..\src\View\template.php');