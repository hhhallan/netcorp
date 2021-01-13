<?php
require('../inc/function.php');
require('../inc/pdo.php');

$status = $_POST['success'];

debug($_POST);

// TOUTES LES REQUETES
$sql = "SELECT * FROM res_trames";
$var = $pdo->prepare($sql);
$var -> execute();
$all = $var->fetchAll();
//debug($all);
$nbAll = count($all);
//echo $nbAll;




// SUCCESS
$sql = "SELECT * FROM res_trames WHERE status = :status";
$var = $pdo->prepare($sql);
$var->bindValue(':status',$status,PDO::PARAM_STR);
$var -> execute();
$success = $var->fetchAll();
//debug($success);
$nbSuccess = count($success);
echo $nbSuccess;


$data = array(
    'nball' => $nbAll,
    'nbsuccess' => $nbSuccess
);
showJson($data);

