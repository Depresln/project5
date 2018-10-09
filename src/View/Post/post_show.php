<?php
session_start();
use App\Repository\CommentRepository;
$title  = 'Nicolas Depresles';
ob_start();

    $url = $_GET['id'];
    $_SESSION['previous'] = $url;

    // Navbar
    require 'src/View/navbar.php';

    // Comment successfully added
    if(isset($_SESSION['pseudo'])){
        if(isset($_SESSION['addSuccess']) && $_SESSION['addSuccess'] == "true"){
            echo "<br /><br /><br /><br /><br /><div class='alert alert-success margin-top neg-margin'>Commentaire ajouté avec succès ! En attente de validation...</div>";
            $_SESSION['addSuccess'] = "false";
        }
    }

    // Comment successfully deleted
    if(isset($_SESSION['pseudo'])){
        if(isset($_SESSION['deleteSuccess']) && $_SESSION['deleteSuccess'] == "true"){
            echo "<br /><br /><br /><br /><br /><div class='alert alert-success margin-top neg-margin'>Commentaire supprimé avec succès !</div><br /><br />";
            $_SESSION['deleteSuccess'] = "false";
        }
    }

    // Post content
    /** @var \App\Entity\Post $post */
    ?>
    <div class="container margin-top">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?php echo $post->getTitle() ?></h2>
                <hr class="star-primary -align-left">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-8">
                <?php echo "par " . $post->getPseudo(); ?>
                <br />
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11 col-lg-offset-1">
                <p class="pChapo">
                    <?php echo $post->getChapo(); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>
                    <?php echo $post->getContent(); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-8">
                    <?php echo "Le " . $post->getDate(); ?>
                <br />
            </div>
        </div>
    </div>
    <?php

    // Edit post (admin only)
    if(isset($_SESSION['pseudo'])) {
        if ($_SESSION['is_admin'] == TRUE) {
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-8">
                        <?php echo '<a href="?page=post.edit&id=' . $_GET['id'] . '">Editer le post</a>'; ?>
                    </div>
                </div>
            </div>
        <?php
        }
    }

    // Add comment (all users)
    if(isset($_SESSION['pseudo'])) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php echo '<br /><a href="?page=comment.add&id=' . $post->getId() . '" class="btn btn-success btn-lg">Ajouter un commentaire</a><br /><br />'; ?>
                </div>
            </div>
        </div>
    <?php
    }

    // Show comments with delete option
    /** @var \App\Entity\Comment $comment */
    foreach ($commentByDate as $comment) {
    ?>
    <br />
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 fa-border">
            <?php
                $reqAuthor = $comment->getAuthor();
                $commentRepository = new CommentRepository();
                $author = $commentRepository->getAuthorById($reqAuthor);
            ?>
            <div class='pull-right'><?php echo "par " . $author ?></div><br />
            <p class="pComment text-center"><?php echo $comment->getContent(); ?></p>
            <div class='pull-right'><?php echo "Le " . $comment->getDate() ?></div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['pseudo'])) {
            if ($_SESSION['id'] == $comment->getAuthor() OR $_SESSION['is_admin'] == TRUE) {
    ?>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-8">
            <?php echo '<a href="?page=comment.delete&id=' . $comment->getIdComment() . '">Supprimer le commentaire</a><br /><br />'; ?>
        </div>
    </div>
    <?php
            }
        }
    }

    ?>
    <div class="margin-bot"></div>
    <?php

    // Footer
    require 'src/View/footer.php';

$content = ob_get_clean();
include('src/View/template.php');
?>
