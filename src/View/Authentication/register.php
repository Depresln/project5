<?php
$title  = 'Nicolas Depresles';
ob_start();
?>

    <?php require '../src/View/navbar.php'; ?>

    <br /><br /><br /><br /><br /><br />
    <form action="?page=authentication.checkregister" method="post">
        <p>
            <label for="first_name">Prénom</label> : <input type="text" name="first_name" id="firstName" required /><br />
            <label for="last_name">Nom</label> : <input type="text" name="last_name" id="lastName" required /><br />
            <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" required /><br />
            <label for="pass">Mot de passe</label> :  <input type="password" name="pass" id="pass" required /><br />
            <label for="pass2">Confirmer mot de passe</label> :  <input type="password" name="pass2" id="pass2" required /><br />
            <label for="email">Email</label> :  <input type="email" name="email" id="email" required /><br />

            <input type="submit" value="S'inscrire" />
        </p>
    </form>

    <a href="?page=authentication.login">J'ai déjà un compte.</a>
    <br /><br />

    <?php require '../src/View/footer.php'; ?>

<?php
$content = ob_get_clean();
include('..\src\View\template.php');
?>