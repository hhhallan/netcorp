<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');



include('inc/header.php');
include('modal.php'); ?>



<div class="wrap-homepage">

    <div class="homepage">
        <div class="content-left">
            <?php if (isLogged()) { ?>
                <h1>Bienvenue sur votre compte NetCorp !</h1>

                <p class="accueil">Bonjour <span class="hello-user"><?php echo ucfirst($_SESSION['user']['prenom']); ?></span>, vous pouvez accéder à vos données en cliquant sur le bouton "Mon espace" ! En cas de question, rendez-vous sur la page "contact", vous y retrouverez les adresses mails de nos consultants.</p>
                
                
            <?php } else { ?>
                <h1>NetCorp un choix évident pour analyser vos réseaux !</h1>

                <p> Une équipe à l'écoute des besoins de votre entreprise.
                    Des techniciens formés pour vous accompagner et vous conseiller.
                    Notre technicien se rend dans votre entreprise et procède à l'analyse de votre réseau. Vous pouvez ensuite accéder à vos analyses sous formes de graphiques en vous connectant directement sur notre site. Qu'attendez-vous ? Inscrivez-vous maintenant et restez à jour sur vos analyses !
                </p>

            <?php } ?>
            <div class="left-button">
                <?php if (isLogged()) { ?>
                    <button class="homepage-buttons" onclick="window.location.href='dashboard.php'">Mon espace</button>
                    <button class="homepage-buttons qui" style="display:none;" onclick="window.location.href='abputus.php'">Qui sommes-nous ?</button>
                    <button class="homepage-buttons deco" style="display:none;" onclick="window.location.href='deconnexion.php'">Déconnexion</button>
                <?php  } else { ?>
                    <button type="button" id="homepage-button" class="homepage-buttons" data-toggle="modal" data-target="#exampleModalCenter">
                        Se connecter
                    </button>
                <?php } ?>

            </div>
        </div>

        <img src="asset/img/undraw_data.svg" alt="Illustration unDraw 'data'">
    </div>


</div>




</div>

<?php
include('inc/footer.php');
