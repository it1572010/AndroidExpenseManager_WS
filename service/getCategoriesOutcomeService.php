<?php

include_once '../entity/CategoryOutcome.php';
include_once '../dao/CategoryOutcomeDaoImpl.php';
include_once '../util/PDOUtil.php';

$categoryOutcomeDao = new CategoryOutcomeDaoImpl;
/*
 * @var $result PDOStatement
 */
$result=$categoryOutcomeDao->getAllCategoriesOutcome();
$data=$result->fetchAll();
header("content-type:application/json");
echo json_encode($data);


//$apiKey = filter_input(INPUT_GET, 'api_key');
//header("content-type:application/json");
//if (isset($apiKey)) {
//    $categoryOutcomeDao = new CategoryOutcomeDaoImpl();
//    $result = $categoryOutcomeDao->getAllCategoriesOutcome();
//    $categoriesOutcome = array();
//    foreach ($result as $categoryOutcome) {
//        array_push($categoriesOutcome, $categoryOutcome);
//    }
//    echo json_encode($categoriesOutcome);
//} else {
//    $jsonData = array();
//    $jsonData['status'] = 2;
//    $jsonData['message'] = 'API Key not recognized';
//    echo json_encode($jsonData);
//}