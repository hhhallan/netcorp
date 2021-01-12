<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

$title = 'Mot de passe oublié';
//debug($_POST);
$errors = array();
$success = false;



if(!empty($_POST['submitted-mdp']))
{
    $email = cleanXss($_POST['email']);

    // Verif email
    if(!empty($email))
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = 'Veuillez rensiegner un e-mail valide.';
        }
    } else {
        $errors['email'] = 'Veuillez rensiegner un e-mail.';
    }

    // 0 erreurs
    if(count($errors) == 0)
    {
        

        $sql = "SELECT * FROM res_users WHERE email = :email";
        $var = $pdo->prepare($sql);
        $var->bindValue(':email',$email,PDO::PARAM_STR);
        $var->execute();
        $user = $var->fetch();
        //debug($user);


        if(!empty($user))
        {
            $success = true;
            $token = generateRandomString(255);
            $goodToken = $token;

            $sql = "UPDATE res_users SET token = :token, token_at = NOW() WHERE id = :id";
            $var = $pdo->prepare($sql);
            $var->bindValue(':token',$goodToken,PDO::PARAM_STR);
            $var->bindValue(':id',$user['id'],PDO::PARAM_INT);
            $var->execute();

            header('Location: resetmdp.php?email='.$user['email'].'&token='.$goodToken);
            // FAIRE UNE REDIRECTION

        } else {
            $errors['email'] = 'Utilisateur introuvable...';
        }
    }
}

include('inc/header.php'); ?>

<div class="wrap-forgot">

    <form id="form-forgot" method="post" action="forgotmdp.php">
        <h1>Mot de passe oublié</h1>
        <p>Vous allez recevoir un e-mail pour reset votre mot de passe</p>
        <div class="form-group">
            <input type="email" name="email" placeholder="E-mail">
            <span class="error"></span>
        </div>

        <div class="form-group">
            <input type="submit" id="submitted-mdp" name="submitted-mdp" value="forgot password">
        </div>
    </form>

</div>

<?php
include('inc/footer.php');
