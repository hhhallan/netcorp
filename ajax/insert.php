<?php
require('../inc/function.php');
require('../inc/pdo.php');

echo ('test');

$date = trim(strip_tags($_POST['date']));
$version = trim(strip_tags($_POST['version']));
$nomPro = trim(strip_tags($_POST['nomPro']));
$ipFrom = trim(strip_tags($_POST['ipFrom']));
$ipDest = trim(strip_tags($_POST['ipDest']));

echo ('test');

$sql = "INSERT INTO res_trames (date,version,protocole_name,ip_from,ip_dest) VALUES(:date,:version,:nomPro,:ipFrom,:ipDest)";
$query = $pdo->prepare($sql);
$query->bindValue(':date', $date, PDO::PARAM_STR);
$query->bindValue(':version', $version, PDO::PARAM_INT);
$query->bindValue(':nomPro', $nomPro, PDO::PARAM_STR);
$query->bindValue(':ipFrom', $ipFrom, PDO::PARAM_STR);
$query->bindValue(':ipDest', $ipDest, PDO::PARAM_STR);
$query->execute();