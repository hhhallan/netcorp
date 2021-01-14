<?php
require('../inc/function.php');
require('../inc/pdo.php');

$identification = cleanXss($_POST['identification']);
$date = cleanXss($_POST['date']);
$version = cleanXss($_POST['version']);
$nomPro = cleanXss($_POST['nomPro']);
$flags = cleanXss($_POST['flags']);
$proCheck = cleanXss($_POST['proCheck']);
$headCheck = cleanXss($_POST['headCheck']);
$portFrom = cleanXss($_POST['portFrom']);
$portDest = cleanXss($_POST['portDest']);
$ipFrom = cleanXss($_POST['ipFrom']);
$ipDest = cleanXss($_POST['ipDest']);
$status = cleanXss($_POST['status']);
$ttl = cleanXss($_POST['ttl']);

$sql = "INSERT INTO res_trames (identifiant,date,status,version,protocol_name,flags,ttl,protocol_checksum,header_checksum,port_from,port_dest,ip_from,ip_dest) VALUES(:identification,:date,:status,:version,:nomPro,:flags,:ttl,:proCheck,:headCheck,:portFrom,:portDest,:ipFrom,:ipDest)";
$query = $pdo->prepare($sql);
$query->bindValue(':identification', $identification, PDO::PARAM_STR);
$query->bindValue(':date', $date, PDO::PARAM_STR);
$query->bindValue(':status', $status, PDO::PARAM_STR);
$query->bindValue(':version', $version, PDO::PARAM_INT);
$query->bindValue(':nomPro', $nomPro, PDO::PARAM_STR);
$query->bindValue(':flags', $flags, PDO::PARAM_STR);
$query->bindValue(':ttl', $ttl, PDO::PARAM_INT);
$query->bindValue(':proCheck', $proCheck, PDO::PARAM_STR);
$query->bindValue(':headCheck', $headCheck, PDO::PARAM_STR);
$query->bindValue(':portFrom', $portFrom, PDO::PARAM_STR);
$query->bindValue(':portDest', $portDest, PDO::PARAM_STR);
$query->bindValue(':ipFrom', $ipFrom, PDO::PARAM_STR);
$query->bindValue(':ipDest', $ipDest, PDO::PARAM_STR);
$query->execute();


