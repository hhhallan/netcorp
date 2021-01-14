<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');



include('inc/header.php'); 
include('modal.php'); ?>



<div class="wrap-homepage">

    <div class="homepage">
        <div class="content-left">
            <h1>Projet réseaux en groupe de 4.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime quis laboriosam itaque sed quas, accusantium ratione. Odit, iste est. Amet, ipsum voluptatem. Mo Illo? Lorem ipsum dolobus enim adipisci facilis, iure non suscipit quo repellendus!</p>

            <div class="left-button">
                <?php if (isLogged()) { ?>
                    <button class="homepage-buttons" onclick="window.location.href='dashboard.php'">Mon espace</button>
                    <!-- <button class="homepage-buttons" onclick="window.location.href='deconnexion.php'">deco</button> -->
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
