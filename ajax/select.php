<?php
require('../inc/function.php');
require('../inc/pdo.php');

$identification = trim(strip_tags($_POST['identification']));
$date = trim(strip_tags($_POST['date']));
$version = trim(strip_tags($_POST['version']));
$nomPro = trim(strip_tags($_POST['nomPro']));
$flags = trim(strip_tags($_POST['flags']));
$proCheck = trim(strip_tags($_POST['proCheck']));
$headCheck = trim(strip_tags($_POST['headCheck']));
$portFrom = trim(strip_tags($_POST['portFrom']));
$portDest = trim(strip_tags($_POST['portDest']));
$ipFrom = trim(strip_tags($_POST['ipFrom']));
$ipDest = trim(strip_tags($_POST['ipDest']));

$sql = "SELECT * FROM res_trames WHERE identifiant = :identification AND date = :date AND version = :version AND protocol_name = :nomPro AND flags = :flags AND protocol_checksum = :proCheck AND header_checksum = :headCheck AND port_from = :portFrom AND port_dest = :portDest AND ip_from = :ipFrom AND ip_dest = :ipDest";
$query = $pdo->prepare($sql);
$query->bindValue(':identification', $identification, PDO::PARAM_STR);
$query->bindValue(':date', $date, PDO::PARAM_STR);
$query->bindValue(':version', $version, PDO::PARAM_INT);
$query->bindValue(':nomPro', $nomPro, PDO::PARAM_STR);
$query->bindValue(':flags', $flags, PDO::PARAM_STR);
$query->bindValue(':proCheck', $proCheck, PDO::PARAM_STR);
$query->bindValue(':headCheck', $headCheck, PDO::PARAM_STR);
$query->bindValue(':portFrom', $portFrom, PDO::PARAM_STR);
$query->bindValue(':portDest', $portDest, PDO::PARAM_STR);
$query->bindValue(':ipFrom', $ipFrom, PDO::PARAM_STR);
$query->bindValue(':ipDest', $ipDest, PDO::PARAM_STR);
$query->execute();
$trame = $query->fetch();

$data = array(
    'trame' => $trame
);
showJson($data);