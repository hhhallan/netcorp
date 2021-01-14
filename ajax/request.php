<?php
require('../inc/function.php');
require('../inc/pdo.php');

$sql = "SELECT COUNT(DAY(date)), DAY(date) FROM res_trames GROUP BY DAY(date)";
$query = $pdo->prepare($sql);
$query->execute();
$requestDate = $query->fetchAll();

$size = count($requestDate);
$nbRequest = $requestDate[0]['COUNT(DAY(date))'];
for ($i = 1; $i < $size; $i++) {
    $nbRequest .= ' ,' . $requestDate[$i]['COUNT(DAY(date))'];
}

$data = array(
    'nbRequest' => array(
        'nbOne' => $requestDate[0]['COUNT(DAY(date))'],
        'nbTwo' => $requestDate[1]['COUNT(DAY(date))'],
        'nbThree' => $requestDate[2]['COUNT(DAY(date))']
    ),
    'times' => array(
        'jourOne' => $requestDate[0]['DAY(date)'],
        'jourTwo' => $requestDate[1]['DAY(date)'],
        'jourThree' => $requestDate[2]['DAY(date)']
    )
);

showJson($data);
