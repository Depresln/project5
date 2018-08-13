<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    if(isset($_SESSION['pseudo'])){
        ?>
        <form action="?page=comment.checkcreation&id=<?= $_GET['id'] ?>" method="post">
            <p>
                <label for="content">Message</label> : <textarea name="content" id="content" required></textarea><br />
                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />

                <input type="submit" value="Poster le commentaire" />
            </p>
        </form>
        <?php
    } else {
        echo "Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
    }

$content = ob_get_clean();
include('..\src\View\template.php');
?>