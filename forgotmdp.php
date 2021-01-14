<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

$title = 'Mot de passe oublié';

include('inc/header.php'); 
include('modal.php'); ?>

<div class="wrap-forgot">
    <div id="forgot-password">

        <div class="formulaire-forgot">

            <h2 class="password-title">Mot de passe oublié</h2>
            <p>Vous allez recevoir un e-mail pour rénitialiser votre mot de passe.</p>
            

            <form id="form-forgot" method="post" action="ajax/ajax-forgot.php">
                <div class="form-group">
                    <input type="email" class="form-control password-oubli" name="email" id="email" placeholder="E-mail">
                    <span class="error" id="error-forgot-email"></span>
                </div>

                <div class="form-group">
                    <input type="submit" class="form-control" id="submitted-mdp" name="submitted-mdp" value="Confirmer">
                </div>
            </form>

            <a href="index.php">Retour</a>

        </div>

        <div class="img-forgot"><img src="asset/img/forgot-pass-yellow.svg" alt="Mot de passe oublié"></div>
        

    </div>
</div>

<?php
include('inc/footer.php');
