<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    // Navbar
    require '../src/View/navbar.php';

    ?>
    <div class="margin-top"></div>
    <?php

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
            ?>
            <div class="container margin-bot">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <?php echo "<a href='?page=post.index' class='btn btn-lg btn-success'>Retour au blog</a><br /><br />"; ?>
                    </div>
                </div>
            </div>
            <br />
            <?php
        }
    }

    // Footer
    require '../src/View/footer.php';

$content = ob_get_clean();
include('..\src\View\template.php');
