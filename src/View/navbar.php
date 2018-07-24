<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">Nicolas DEPRESLES</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <?php
                    if ($_GET["page"] === "default.home") {
                        echo '<li class="page-scroll"><a href="#portfolio">Portfolio</a></li>
                            <li class="page-scroll"><a href="#about">A propos</a></li>
                            <li class="page-scroll"><a href="#contact">Contact</a></li>
                            <li><a href="?page=post.index">Blog</a></li>';
                        if (isset($_SESSION['pseudo'])) {
                            echo '<li class="page-scroll"><a href="?page=authentication.logout">Se déconnecter</a></li>';
                        } else {
                            echo '<li class="page-scroll"><a href="?page=authentication.register">S\'enregistrer</a></li><li class="page-scroll"><a href="?page=authentication.login">Se connecter</a></li>';
                        }
                    } elseif ($_GET["page"] === "authentication.login") {
                        echo '<li class="page-scroll"><a href="?page=default.home">Accueil</a></li>
                            <li class="page-scroll"><a href="?page=authentication.register">S\'enregistrer</a></li>';
                    } elseif ($_GET["page"] === "authentication.register") {
                        echo '<li class="page-scroll"><a href="?page=default.home">Accueil</a></li>
                            <li class="page-scroll"><a href="?page=authentication.login">Se connecter</a></li>';
                    } elseif ($_GET["page"] === "authentication.logout") {
                        echo '<li class="page-scroll"><a href="?page=default.home">Accueil</a></li>
                            <li class="page-scroll"><a href="?page=authentication.register">S\'enregistrer</a></li>
                            <li class="page-scroll"><a href="?page=authentication.login">Se connecter</a></li>';
                    } else {
                        if (isset($_SESSION['pseudo'])) {
                            echo '<li class="page-scroll"><a href="?page=default.home">Accueil</a></li>
                                <li class="page-scroll"><a href="?page=authentication.logout">Se déconnecter</a></li>';
                        } else {
                            echo '<li class="page-scroll"><a href="?page=default.home">Accueil</a></li>
                                <li class="page-scroll"><a href="?page=authentication.register">S\'enregistrer</a></li>
                                <li class="page-scroll"><a href="?page=authentication.login">Se connecter</a></li>';
                        }
                    }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
