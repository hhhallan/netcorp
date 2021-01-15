<?php
require('../inc/function.php');
require('../inc/pdo.php');

$sql = "SELECT ttl, DAY(date) FROM res_trames GROUP BY date";
$query = $pdo->prepare($sql);
$query->execute();
$ttlDates = $query->fetchAll();

$sql = "SELECT DAY(date), MONTH(date) FROM res_trames GROUP BY DAY(date)";
$query = $pdo->prepare($sql);
$query->execute();
$times = $query->fetchAll();

$size = count($ttlDates);

$lostOne = 0;
$lostTwo = 0;
$lostThree = 0;

for ($i = 0; $i < $size; $i++) {
    if ($ttlDates[$i]['DAY(date)'] == $times[0]['DAY(date)']) {
        $lostOne += 128 - $ttlDates[$i]['ttl'];
    } elseif ($ttlDates[$i]['DAY(date)'] == $times[1]['DAY(date)']) {
        $lostTwo += 128 - $ttlDates[$i]['ttl'];
    } elseif ($ttlDates[$i]['DAY(date)'] == $times[2]['DAY(date)']) {
        $lostThree += 128 - $ttlDates[$i]['ttl'];
    }
}

$ttlLost = array(
    'loseOne' => $lostOne,
    'loseTwo' => $lostTwo,
    'loseThree' => $lostThree
);
$jOne = $times[0]['DAY(date)'] . '/' . $times[0]['MONTH(date)'];
$jTwo = $times[1]['DAY(date)'] . '/' . $times[1]['MONTH(date)'];
$jThree = $times[2]['DAY(date)'] . '/' . $times[2]['MONTH(date)'];

$data = array(
    'dates' => array(
        'jOne' => $jOne,
        'jTwo' => $jTwo,
        'jThree' => $jThree
    ),
    'ttlLost' => $ttlLost,
);


showJson($data);
