<?php
    session_start();
    $title  = 'Nicolas Depresles';
    ob_start();

    /** @var \App\Entity\Post $post */
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            ?>
            <form action="?page=post.checkedit&id=<?= $_GET['id'] ?>" method="post">
                <p>
                    <label for="title">Titre</label> : <input type="text" name="title" id="title" value="<?= $post->getTitle() ?>" required /><br />
                    <label for="chapo">Description</label> : <input type="text" name="chapo" id="chapo" value="<?= $post->getChapo() ?>" required /><br />
                    <label for="content">Contenu</label> : <textarea name="content" id="content" required><?= $post->getContent() ?></textarea><br />
                    <input type="hidden" name="id" value="<?=$_SESSION['id']?>" />

                    <input type="submit" value="Editer l'article" />
                </p>
            </form>
            <?php
        } else {
            echo "Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
        }
    } else {
        echo "Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
    }

    $content = ob_get_clean();

    include('..\src\View\template.php');
?>