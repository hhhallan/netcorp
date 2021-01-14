<?php
session_start();
require('../inc/pdo.php');
require('../inc/function.php');

//debug($_POST);
$errors = array();
$success = false;
$emailAjax = array();
$tokenAjax = array();

$sql = "SELECT * FROM res_users";
$var = $pdo->prepare($sql);
$var->execute();
$user = $var->fetch();
//debug($user);

// 1. Si submit non rempli => erreur (renseigner les champs)
// 2. Si email NON rentré puis NON valide puis NE correspond pas à un utilisateur => erreur (user introuvable)(invalide)(non rempli)
// 3. S'il n'y a pas d'erreurs => update du token


    $email = cleanXss($_POST['email']);

    if(!empty($email))
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            if($email == $user['email'])
            {
            $success = true;
            $token = generateRandomString(255);

            $sql = "UPDATE res_users SET token = :token, token_at = NOW() WHERE id = :id";
            $var = $pdo->prepare($sql);
            $var->bindValue(':token',$token,PDO::PARAM_STR);
            $var->bindValue(':id',$user['id'],PDO::PARAM_INT);
            $var->execute();

            $tokenAjax = $token;
            $emailAjax = $user['email'];
            //header('Location: resetmdp.php?email='.$user['email'].'&token='.$goodToken);
            //echo '<a href="resetmdp.php?email='.$user['email'].'&token='.$goodToken.'">LIEN RESET</a>';
            // FAIRE UNE REDIRECTION
            } else {
                $errors['email'] = 'Utilisateur inexistant.';
            }

        } else {
            $errors['email'] = 'Veuillez renseigner un e-mail valide.';
        }
    } else {
        $errors['email'] = 'Veuillez renseigner ce champ.';
    }

$data = array(
    'errors' => $errors,
    'success' => $success,
    'token' => $tokenAjax,
    'emailUser' => $emailAjax
);
showJson($data);