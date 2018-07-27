<?php
    $title  = 'Nicolas Depresles';
    ob_start();
?>
    <div id="page-top" class="index">

        <?php require '../src/View/navbar.php'; ?>

        <div class="container" align="center"><br /><br /><br /><br /><br /><br /><br />
            <form action="?page=authentication.checklogin" method="post">
                <p>
                    <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" required /><br />
                    <label for="pass">Mot de passe</label> :  <input type="password" name="pass" id="pass" required /><br />

                    <input type="submit" value="Se connecter" />
                </p>
            </form>
        </div>

        <?php require '../src/View/footer.php'; ?>
    </div>

<?php
    $content = ob_get_clean();

    include('..\src\View\template.php');
?>