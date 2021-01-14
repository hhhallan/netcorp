<?php
require('../inc/function.php');
require('../inc/pdo.php');

$sql = "SELECT protocol_name FROM res_trames";
$query = $pdo->prepare($sql);
$query->execute();
$tramesNames = $query->fetchAll();

$size = count($tramesNames);
$udp = 0;
$tcp = 0;
$icmp = 0;
$tls = 0;
$other = 0;
foreach ($tramesNames as $trameName) { 
    if ($trameName['protocol_name'] == 'UDP') {
        $udp = $udp + 1;
    } elseif ($trameName['protocol_name'] == 'TCP') {
        $tcp = $tcp + 1;
    } elseif ($trameName['protocol_name'] == 'ICMP') {
        $icmp = $icmp + 1;
    } elseif ($trameName['protocol_name'] == 'TLSv1.2') {
        $tls = $tls + 1;
    } else {
        $other = $other + 1;
    }
}

$data = array(
    'udp' => $udp,
    'tcp' => $tcp,
    'icmp' => $icmp,
    'tls' => $tls,
    'other' => $other
);

showJson($data);
