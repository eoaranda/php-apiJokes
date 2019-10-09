<?php

require $_SERVER['DOCUMENT_ROOT'] . "/apiJokes/controllers/apiController.php";

header("Content-Type: application/json; charset=UTF-8");
header('Content-type: application/json');
$j = new apiController();
echo $j->getJokes($_GET['count']);
 