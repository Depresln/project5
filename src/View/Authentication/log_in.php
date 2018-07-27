<?php
    $title  = 'Nicolas Depresles';
    ob_start();
?>

    <form action="?page=authentication.checklogin" method="post">
        <p>
            <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" required /><br />
            <label for="pass">Mot de passe</label> :  <input type="password" name="pass" id="pass" required /><br />

            <input type="submit" value="Se connecter" />
        </p>
    </form>

    <a href="?page=authentication.register">Créer un compte.</a>

<?php
    $content = ob_get_clean();

    include('..\src\View\template.php');
?>