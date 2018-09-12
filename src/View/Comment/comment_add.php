<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    if(isset($_SESSION['pseudo'])){
        ?>
        <div id="page-top" class="index">
        <?php require 'src/View/navbar.php'; ?>

        <div class="container margin-top margin-bot" align="center">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Envoyer un commentaire</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form action="?page=comment.checkcreation&id=<?= $_GET['id'] ?>" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <label>Message</label> <textarea rows="5" class="form-control" placeholder="Message" name="content" id="content" required data-validation-required-message="Veuillez entrer votre commentaire."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />
                        <br />
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Poster le commentaire</button>
                            </div>
                        </div>
                        <br />
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
    }

    require 'src/View/footer.php';

$content = ob_get_clean();
include('src\View\template.php');
?>