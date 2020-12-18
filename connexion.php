<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

$errors = array();
$success = false;


$email = cleanXss($_POST['co-email']);
$password = cleanXss($_POST['co-password']);

if (!empty($email) && !empty($password)) {
    $sql = "SELECT * FROM res_users WHERE email = :email";
    $var = $pdo->prepare($sql);//table colonne valeur => pour telle table
    $var->bindValue(':email', $email, PDO::PARAM_STR);
    $var->execute();
    $user = $var->fetch();
    //debug($user);

    if (!empty($user)) {
        //$hashPassword = $user['password'];

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = array(
                'id' => $user['id'],
                'email' => $user['email'],
                'prenom' => $user['name'],
                'ip' => $_SERVER['REMOTE_ADDR']
                
            );

        } else {
            $errors['connexion'] = 'Erreur email/mdp';
        }
    } else {
        $errors['connexion'] = 'Error credentials';
    }
} else {
    $errors['connexion'] = 'Veuillez renseigner les champs';
}



// 0 ERREURS
if (count($errors) == 0) {
    $success = true;

    //die();
}




$data = array(
    'errors' => $errors,
    'success' => $success
);
showJson($data);
