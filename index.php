<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

include('inc/header.php'); ?>



<div class="wrap-homepage">

    <div class="homepage">
        <div class="content-left">
            <h1>Projet réseaux en groupe de 4.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime quis laboriosam itaque sed quas, accusantium ratione. Odit, iste est. Amet, ipsum voluptatem. Mo Illo? Lorem ipsum dolobus enim adipisci facilis, iure non suscipit quo repellendus!</p>
            <div class="left-button">
                <button id="homepage-button">Se connecter</button>
            </div>
            
        </div>

        <img src="asset/img/undraw_data.svg" alt="Illustration unDraw 'data'">
    </div>

</div>


<?php
include('inc/footer.php');
