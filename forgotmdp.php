<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

$title = 'Mot de passe oublié';
//debug($_POST);
$errors = array();
$success = false;

// 1. Si submit non rempli => erreur (renseigner les champs)
// 2. Si email NON rentré puis NON valide puis NE correspond pas à un utilisateur => erreur (user introuvable)(invalide)(non rempli)
// 3. S'il n'y a pas d'erreurs => update du token

if(!empty($_POST['submitted-mdp']))
{
    $email = cleanXss($_POST['email']);
    if(!empty($email))
    {

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {

            $sql = "SELECT * FROM res_users WHERE email = :email";
            $var = $pdo->prepare($sql);
            $var->bindValue(':email',$email,PDO::PARAM_STR);
            $var->execute();
            $user = $var->fetch();
            debug($user);

            if($email == $user['email'])
            {
            $success = true;
            $token = generateRandomString(255);
            $goodToken = $token;

            $sql = "UPDATE res_users SET token = :token, token_at = NOW() WHERE id = :id";
            $var = $pdo->prepare($sql);
            $var->bindValue(':token',$goodToken,PDO::PARAM_STR);
            $var->bindValue(':id',$user['id'],PDO::PARAM_INT);
            $var->execute();

            //header('Location: resetmdp.php?email='.$user['email'].'&token='.$goodToken);
            echo '<a href="resetmdp.php?email='.$user['email'].'&token='.$goodToken.'">LIEN RESET</a>';
            // FAIRE UNE REDIRECTION
            } else {
                echo 'utilisateur inexistant';
            }

        } else {
            echo 'erreur email invalide';
        }
    } else {
        echo 'erreur email non rempli';
    }
} else {
    echo 'erreur submit';
}


include('inc/header.php'); ?>

<div class="wrap-forgot">

        <h1>Mot de passe oublié</h1>
        <p>Vous allez recevoir un e-mail pour rénitialiser votre mot de passe.</p>

    <form id="form-forgot" method="post" action="forgotmdp.php">
        <div class="form-group">
            <input type="email" name="email" placeholder="E-mail">
            <span class="error"></span>
        </div>

        <div class="form-group">
            <input type="submit" id="submitted-mdp" name="submitted-mdp" value="Confirmer">
        </div>
    </form>

</div>

<?php
include('inc/footer.php');