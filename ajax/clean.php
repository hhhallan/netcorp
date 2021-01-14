<?php
require('../inc/function.php');
require('../inc/pdo.php');

$sql = "DELETE FROM res_trames";
$query = $pdo->prepare($sql);
$query->execute();