<?php 
session_start();
require('inc/pdo.php');
require('inc/function.php');

$title = 'Réinitialiser le mot de passe';

$errors = array();
$success = false;

//debug($_GET);




   // 1. Vérifier que email et token correspondent à celui de l'utilisateur (=sécurité dans la barre)
if(!empty($_GET['email']) && !empty($_GET['token']))
{
    $email = cleanXss($_GET['email']);
    $token = cleanXss($_GET['token']);

    $sql = "SELECT * FROM res_users WHERE email = :email AND token = :token";
    $var = $pdo->prepare($sql);
    $var->bindValue(':email',$email,PDO::PARAM_STR);
    $var->bindValue(':token',$token,PDO::PARAM_STR);
    $var->execute();
    $user = $var->fetch();
    debug($user);

    if($email == $user['email'] && $token == $user['token'])
    {
        // token_at pour verifier la date ( mettre un limite d'une heure )
        if(tokenDelay($user['token_at'],3600))
        {
            if(!empty($_POST['submitted-reset']))
            {
                // 2. $user -> password - cpassword 
                // si !empty password et cpassword => min cara et verification des deux mots de passe
                //debug($_POST);
                $password = cleanXss($_POST['password']);
                $cpassword = cleanXss($_POST['cpassword']);
                if (!empty($password) && !empty($cpassword)) {
                    if ($password != $cpassword) {
                        $errors['cpassword'] = 'Veuillez renseigner des mots de passe identiques.';
                    } elseif (mb_strlen($password) < 6) {
                        $errors['password'] = 'Minimum 6 caractères';
                    }
                } else {
                    $errors['password'] = 'Veuillez renseigner vos mots de passe.';
                    $errors['cpassword'] = 'Veuillez renseigner vos mots de passe.';
                }

                // 3. 0 erreurs => hashpass ; update sql -> password = nvpass et token = '' where id = id et email = email
                if(count($errors) == 0)
                {
                    $success = true;

                    // insertion BDD
                    $hashPassword = password_hash($password,PASSWORD_DEFAULT);

                    $sql = "UPDATE res_users SET password = :password, token = '' WHERE id= :id AND email = :email";
                    $var = $pdo->prepare($sql);
                    $var->bindValue(':id',$user['id'],PDO::PARAM_INT);
                    $var->bindValue(':email',$user['email'],PDO::PARAM_STR);
                    $var->bindValue(':password',$hashPassword,PDO::PARAM_STR);
                    $var->execute();

                    header('Location: index.php');
                }



            } else {
                echo 'pas remplie';
            }

        } else {
            die('marche pas pcq + 1heure');
        }
    } else {
        die('marche pas pcq correspond pas');
    }
} else {
    die('marche pas pcq vide');
}
   





include('inc/header.php'); ?>

<div class="wrap-reset-mdp">
    <h2>Réinitialiser votre mot de passe</h2>
    <form method="post">
        <div class="form-group">
          <input type="password" id="password" name="password" placeholder="Mot de passe">
          <span class="error"></span>
        </div>

        <div class="form-group">
         <input type="password" id="cpassword" name="cpassword" placeholder="Confirmer votre mot de passe">
         <span class="error"></span>
        </div>

        <div class="form-group">
         <input type="submit" id="submitted-reset" name="submitted-reset" value="Confirmer">
        </div>
    </form>
</div>

<?php
include('inc/footer.php');