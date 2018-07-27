<?php
    session_start();
    session_destroy();
    $title  = 'Nicolas Depresles';
    ob_start();
?>

    <p>Vous vous êtes bien déconnecté.</p><br />

    <a href="?page=default.home">Retour à l'accueil.</a>

<?php
    $content = ob_get_clean();

    include('..\src\View\template.php');
?>