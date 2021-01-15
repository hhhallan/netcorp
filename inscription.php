<?php
require('inc/pdo.php');
require('inc/function.php');
//debug($_POST);

$title = 'Inscription';

$errors = array();
$success = false;


$prenom = cleanXss($_POST['prenom']);
$nom = cleanXss($_POST['nom']);
$email = cleanXss($_POST['in-email']);
$password = cleanXss($_POST['in-password']);
$cpassword = cleanXss($_POST['in-confirm-password']);


$errors = validationText($errors, $prenom, 'prenom', 2, 50);
$errors = validationText($errors, $nom, 'nom', 2, 50);

// EMAIL
if (!empty($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] =  'Veuillez renseigner un e-mail valide.';
    } else {
        $sql = "SELECT id FROM res_users WHERE email = :email";
        $var = $pdo->prepare($sql);
        $var->bindValue(':email', $email, PDO::PARAM_STR);
        $var->execute();
        $verifEmail = $var->fetch();
        if (!empty($verifEmail)) {
            $errors['email'] = 'Cet e-mail est déjà utilisé.';
        }
    }
} else {
    $errors['email'] = 'Veuillez renseigner un e-mail.';
}

// PASSWORDS
if (!empty($password) && !empty($cpassword)) {
    if ($password != $cpassword) {
        $errors['cpassword'] = 'Veuillez renseigner des mots de passe identiques.';
    } elseif (mb_strlen($password) < 6) {
        $errors['password'] = 'Minimum 6 caractères';
    }
} else {
    $errors['password'] = 'Veuillez renseigner vos mots de passe.';
}


// 0 ERREURS
if (count($errors) == 0) {
    $success = true;

    // insertion BDD
    $hashPassword = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO res_users (name,surname,email,password,created_at)
            VALUES (:prenom,:nom,:email,:password,NOW())";
    $var = $pdo->prepare($sql);
    $var->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $var->bindValue(':nom',$nom,PDO::PARAM_STR);
    $var->bindValue(':email',$email,PDO::PARAM_STR);
    $var->bindValue(':password',$hashPassword,PDO::PARAM_STR);
    $var->execute();
}




$data = array(
    'errors' => $errors,
    'success' => $success
);
showJson($data);
