<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    // Navbar
    require 'src/View/navbar.php';

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            ?>

            <div class="container margin-top margin-bot" align="center">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Créer un post</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="?page=post.checkcreation" method="post">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Titre</label>
                                    <input type="text" class="form-control" placeholder="Titre" name="title" id="title" required data-validation-required-message="Veuillez entrer votre prénom.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Description</label>
                                    <input type="text" class="form-control" placeholder="Description" name="chapo" id="chapo" required data-validation-required-message="Veuillez entrer votre prénom.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Contenu</label>
                                    <textarea rows="10" class="form-control" placeholder="Contenu" name="content" id="content" required data-validation-required-message="Veuillez entrer le contenu du post."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?=$_SESSION['id']?>" />
                            <br />
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Poster l'article</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        } else {
            echo "Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
        }
    } else {
        echo "Vous n'avez pas les droits nécessaires à la visualisation de cette page.";
    }

    // Footer
    require 'src/View/footer.php';

$content = ob_get_clean();
include('src\View\template.php');
?>