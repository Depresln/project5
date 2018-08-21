<?php
$title  = 'Nicolas Depresles';
ob_start();
?>

    <div id="page-top" class="index">
        <?php require '../src/View/navbar.php'; ?>

        <div class="container" align="center"><br /><br /><br /><br /><br /><br />
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Se connecter</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form action="?page=authentication.checklogin" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Pseudo</label>
                                <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" id="pseudo" required data-validation-required-message="Veuillez entrer votre pseudo.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mot de passe</label>
                                <input type="password" class="form-control" placeholder="Mot de passe" name="pass" id="pass" required data-validation-required-message="Veuillez entrer votre mot de passe." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br />
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Se connecter</button>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <a href="?page=authentication.register">Je n'ai pas de compte.</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br />

        <?php require '../src/View/footer.php'; ?>
    </div>

<?php
$content = ob_get_clean();
include('..\src\View\template.php');
?>