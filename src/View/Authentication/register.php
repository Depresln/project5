<?php
$title  = 'Nicolas Depresles';
ob_start();
?>

    <?php require '../src/View/navbar.php'; ?>

    <div class="container margin-top margin-bot" align="center">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>S'enregistrer</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="?page=authentication.checkregister" method="post">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Prénom</label>
                            <input type="text" class="form-control" placeholder="Prénom" name="first_name" id="firstName" required data-validation-required-message="Veuillez entrer votre prénom.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="last_name" id="lastName" required data-validation-required-message="Veuillez entrer votre nom.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
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
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Confirmer mot de passe</label>
                            <input type="password" class="form-control" placeholder="Confirmer mot de passe" name="pass2" id="pass2" required data-validation-required-message="Veuillez confirmer votre mot de passe." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" required data-validation-required-message="Veuillez entrer votre adresse email." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br />
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Se connecter</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <a href="?page=authentication.login">J'ai déjà un compte.</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require '../src/View/footer.php';

$content = ob_get_clean();
include('..\src\View\template.php');
?>