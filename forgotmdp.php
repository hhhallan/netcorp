<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

$title = 'Mot de passe oublié';

include('inc/header.php'); ?>

<div class="wrap-forgot">
    <div id="forgot-password">

        <h1>Mot de passe oublié</h1>
        <p>Vous allez recevoir un e-mail pour rénitialiser votre mot de passe.</p>
        <a href="index.php">Retour</a>

        <form id="form-forgot" method="post" action="ajax/ajax-forgot.php">
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="E-mail">
                <span class="error" id="error-forgot-email"></span>
            </div>

            <div class="form-group">
                <input type="submit" id="submitted-mdp" name="submitted-mdp" value="Confirmer">
            </div>
        </form>

    </div>
</div>

<?php
include('inc/footer.php');
