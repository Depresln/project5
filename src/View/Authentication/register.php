<?php
$title  = 'Nicolas Depresles';
ob_start();
?>

<form action="?authentication.check" method="post">
    <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" required /><br />
        <label for="pass">Mot de passe</label> :  <input type="password" name="pass" id="pass" required /><br />
        <label for="pass2">Confirmer mot de passe</label> :  <input type="password" name="pass2" id="pass2" required /><br />
        <label for="email">Email</label> :  <input type="email" name="email" id="email" required /><br />

        <input type="submit" value="S'inscrire" />
    </p>
</form>

<a href="?page=authentication.login">J'ai déjà un compte.</a>

<?php
$content = ob_get_clean();

include('..\src\View\template.php');
?>