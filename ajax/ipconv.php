<?php
require('../inc/function.php');

$ipFromBase = trim(strip_tags($_POST['ipFrom']));
$ipDestBase = trim(strip_tags($_POST['ipDest']));

$ipFrom = ipConvert($ipFromBase);
$ipDest = ipConvert($ipDestBase);

$data = array(
    'ipFrom' => $ipFrom,
    'ipDest' => $ipDest
);
showJson($data);
