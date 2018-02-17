<?php

include_once '../entity/User.php';
include_once '../entity/Income.php';
include_once '../entity/CategoryIncome.php';
include_once '../dao/UserDaoImpl.php';
include_once '../dao/IncomeDaoImpl.php';
include_once '../dao/CategoryIncomeDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $idIncome= filter_input(INPUT_POST, 'idIncome');
    if (isset($idIncome) && !empty($idIncome)) {
        $incomeDao = new IncomeDaoImpl();
        $income = new Income();
        $income->setIdIncome($idIncome);
        $incomeDao->deleteIncome($income);
        $jsonData = array();
        $jsonData['status'] = 1;
        $jsonData['message'] = 'Data successfully added';
        echo json_encode($jsonData);
    } else {
        $jsonData = array();
        $jsonData['status'] = 2;
        $jsonData['message'] = 'Name is null';
        echo json_encode($jsonData);
    }
} else {
    $jsonData = array();
    $jsonData['status'] = 2;
    $jsonData['message'] = 'API Key not recognized';
    echo json_encode($jsonData);
}