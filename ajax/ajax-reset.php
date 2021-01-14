<?php
session_start();
require('../inc/pdo.php');
require('../inc/function.php');

$errors = array();
$success = false;

$sql = "SELECT * FROM res_users";
$var = $pdo->prepare($sql);
$var->execute();
$user = $var->fetch();
//debug($user);

// 2. $user -> password - cpassword 
// si !empty password et cpassword => min cara et verification des deux mots de passe
//debug($_POST);
$password = cleanXss($_POST['password']);
$cpassword = cleanXss($_POST['cpassword']);
if (!empty($password) && !empty($cpassword)) {
    if ($password != $cpassword) {
        $errors['password'] = 'Veuillez renseigner des mots de passe identiques.';
        $errors['cpassword'] = 'Veuillez renseigner des mots de passe identiques.';
    } elseif (mb_strlen($password) < 6 || mb_strlen($password) < 6) {
        $errors['password'] = 'Minimum 6 caractères';
        $errors['cpassword'] = 'Minimum 6 caractères';
    }
} else {
    $errors['password'] = 'Veuillez renseigner vos mots de passe.';
    $errors['cpassword'] = 'Veuillez renseigner vos mots de passe.';
}

// 3. 0 erreurs => hashpass ; update sql -> password = nvpass et token = '' where id = id et email = email
if (count($errors) == 0) {
    $success = true;

    // insertion BDD
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE res_users SET password = :password, token = '' WHERE id= :id AND email = :email";
    $var = $pdo->prepare($sql);
    $var->bindValue(':id', $user['id'], PDO::PARAM_INT);
    $var->bindValue(':email', $user['email'], PDO::PARAM_STR);
    $var->bindValue(':password', $hashPassword, PDO::PARAM_STR);
    $var->execute();
}


$data = array(
    'errors' => $errors,
    'success' => $success
);
showJson($data);
