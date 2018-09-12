<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    // Navbar
    require 'src/View/navbar.php';

    /** @var \App\Entity\Post $post */
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
?>
            <div class="container margin-top margin-bot" align="center">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Editer le post</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="?page=post.checkedit&id=<?= $_GET['id'] ?>" method="post">
                            <div class="row control-group">
                                <div class="form-group col-xs-12">
                                    <label>Titre</label>
                                    <input type="text" class="form-control" placeholder="Titre" name="title" id="title" value="<?= $post->getTitle() ?>" required data-validation-required-message="Veuillez entrer le titre du post.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12">
                                    <label>Description</label>
                                    <input type="text" class="form-control" placeholder="Description" name="chapo" id="chapo" value="<?= $post->getChapo() ?>" required data-validation-required-message="Veuillez entrer la description du post.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12">
                                    <label>Message</label>
                                    <textarea rows="10" class="form-control" placeholder="Contenu" name="content" id="content" required data-validation-required-message="Veuillez entrer le contenu du post."><?= $post->getContent() ?></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?=$_SESSION['id']?>" />
                            <br />
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Editer l'article</button>
                                    <a href="?page=post.index" class="btn btn-success btn-lg">Retour au blog</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
        } else {
            echo "<div class='margin-top margin-bot'></div>Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
        }
    } else {
        echo "<div class='margin-top margin-bot'></div>Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
    }

    // Footer
    require 'src/View/footer.php';

$content = ob_get_clean();
include('src\View\template.php');
?>