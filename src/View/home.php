<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

require_once "vendor/autoload.php";
?>

    <div id="page-top" class="index">

    <!-- Navbar -->
    <?php require 'src/View/navbar.php'; ?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive img-circle" src="web/assets/img/profile.jpg" alt="">
                    <div class="intro-text">
                        <span class="name">Nicolas DEPRESLES</span>
                        <hr class="star-light">
                        <span class="skills">Développeur Web - HTML/CSS/PHP - Bootstrap/Symfony</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="web/assets/img/portfolio/circulareffect.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="web/assets/img/portfolio/windzy.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="web/assets/img/portfolio/chaletscaviar.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="web/assets/img/portfolio/filmspleinair.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="web/assets/img/portfolio/ndep.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="web/assets/img/portfolio/ecogamelab.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>A propos</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <p>Je suis Nicolas Depresles, un jeune développeur front-end de 24 ans. Je suis énormément attiré par le monde du web, passion que j'ai la chance de pouvoir vivre chaque jour. Fort de nombreuses compétences en développement web ainsi qu'en langues, marketing et communication, je me mets à votre disposition pour donner vie à vos idées quel que soit votre projet, quels que soient vos défis.</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="web/assets/CV 4.4.pdf" download class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Télécharger mon CV
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Me contacter</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" action="web/assets/contact_me.php" method="post" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Veuillez entrer votre nom.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom" id="firstname" required data-validation-required-message="Veuillez entrer votre prénom.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Adresse email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Veuillez entrer votre adresse email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Numéro de téléphone</label>
                                <input type="tel" class="form-control" placeholder="Téléphone" id="phone" required data-validation-required-message="Veuillez entrer votre numéro de téléphone.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez entrer un message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require 'src/View/footer.php' ?>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Circular Effect</h2>
                            <hr class="star-primary">
                            <img src="web/assets/img/portfolio/circulareffect.jpg" class="img-responsive img-centered" alt="">
                            <p>Premier projet très intéressant pour une association environnementale afin de promouvoir leurs événements et leurs bons plans afin de réutiliser les ressources de la planète et ne pas les gâcher.</p>
                            <ul class="list-inline item-details">
                                <li>Client :
                                    <strong><a href="http://circular-effect.org/">Association Circular Effect</a></strong>
                                </li>
                                <li>Date :
                                    <strong>Novembre 2016</strong>
                                </li>
                                <li>Service :
                                    <strong><a href="http://nicolasdep.com/">Intégration</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Windzy</h2>
                            <hr class="star-primary">
                            <img src="web/assets/img/portfolio/windzy.jpg" class="img-responsive img-centered" alt="">
                            <p>Projet pour une start-up organisatrice de soirée. Développement d'un site et d'une application mobile afin de déterminer qui ramène quelle nourriture/quelles boissons à la soirée, ainsi que l'emplacement des magasins les plus proches.</p>
                            <ul class="list-inline item-details">
                                <li>Client :
                                    <strong><a href="http://www.windzy.com/">Start-up Windzy</a></strong>
                                </li>
                                <li>Date :
                                    <strong>Février 2017</strong>
                                </li>
                                <li>Service :
                                    <strong><a href="http://nicolasdep.com/">Développement web</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Chalets & Caviar</h2>
                            <hr class="star-primary">
                            <img src="web/assets/img/portfolio/chaletscaviar.jpg" class="img-responsive img-centered" alt="">
                            <p>Utilisation de Wordpress pour une agence de vente et location de chalets de luxe basée à Courchevel.</p>
                            <ul class="list-inline item-details">
                                <li>Client :
                                    <strong><a href="http://www.chalets-caviar.nicolasdep.com/">Agence Chalets & Caviar</a></strong>
                                </li>
                                <li>Date :
                                    <strong>Septembre 2017</strong>
                                </li>
                                <li>Service :
                                    <strong><a href="http://nicolasdep.com">Intégration</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Films en Plein Air</h2>
                            <hr class="star-primary">
                            <img src="web/assets/img/portfolio/filmspleinair.jpg" class="img-responsive img-centered" alt="">
                            <p>Création et présentation d'une maquette pour une association de diffusion de films en plein air. Le but final étant de déterminer le nombre d'inscrits.</p>
                            <ul class="list-inline item-details">
                                <li>Client :
                                    <strong>Association Films en Plein Air</strong>
                                </li>
                                <li>Date :
                                    <strong>Novembre 2017</a></strong>
                                </li>
                                <li>Service :
                                    <strong><a href="http://nicolasdep.com">Management et intégration</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Site vitrine personnel</h2>
                            <hr class="star-primary">
                            <img src="web/assets/img/portfolio/ndep.png" class="img-responsive img-centered" alt="">
                            <p>Utilisation de toutes mes connaissances de l'époque pour la création d'un site vitrine personnel. L'objectif étant d'utiliser le parallax et le json.</p>
                            <ul class="list-inline item-details">
                                <li>Client :
                                    <strong><a href="http://nicolasdep.com">Nicolas Depresles</a></strong>
                                </li>
                                <li>Date :
                                    <strong>Janvier 2018</strong>
                                </li>
                                <li>Service :
                                    <strong><strong><a href="http://nicolasdep.com">Intégration et Développement</a></strong></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="web/assets/img/portfolio/ecogamelab.png" class="img-responsive img-centered" alt="">
                            <p>Intégration d'un site web via WordPress pour valider ma récente acquisition de cette compétence.</p>
                            <ul class="list-inline item-details">
                                <li>Client :
                                    <strong><a href="http://ecogamelab.com/">Startup EcoGameLabs</a></strong>
                                </li>
                                <li>Date :
                                    <strong>Mars 2018</strong>
                                </li>
                                <li>Service :
                                    <strong><a href="http://nicolasdep.com">Intégration et Développement</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="web/assets/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="web/assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="web/assets/js/jqBootstrapValidation.js"></script>
    <script src="web/assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="web/assets/js/freelancer.min.js"></script>

    </div>

<?php
$content = ob_get_clean();
require('template.php');
?>
