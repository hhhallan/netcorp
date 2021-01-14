<?php
require('../inc/function.php');
require('../inc/pdo.php');

$status = cleanXss($_POST['statu']);

$sql = "SELECT COUNT(id) AS nb FROM res_trames WHERE status = :status";
$query = $pdo->prepare($sql);
$query->bindValue(':status', $status, PDO::PARAM_STR);
$query->execute();
$nbTimeout = $query->fetch();

$sql = "SELECT COUNT(id) AS nb FROM res_trames";
$query = $pdo->prepare($sql);
$query->execute();
$nbAll = $query->fetch();

$nb = array(
    'nbTimeout' => $nbTimeout,
    'nbAll' => $nbAll
);

showJson($nb);