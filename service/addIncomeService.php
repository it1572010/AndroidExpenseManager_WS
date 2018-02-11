<?php

include_once '../entity/User.php';
include_once '../entity/Income.php';
include_once '../entity/CategoryIncome.php';
include_once '../dao/IncomeDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $idIncome = filter_input(INPUT_POST, 'idIncome');
    $moneyIncome = filter_input(INPUT_POST, 'moneyIncome');
    $informationIncome = filter_input(INPUT_POST, 'informationIncome');
    $timeIncome = filter_input(INPUT_POST, 'timeIncome');
    $User_idUser = filter_input(INPUT_POST, 'User_idUser');
    $CateogryIncome_idCateogryIncome = filter_input(INPUT_POST, 'CateogryIncome_idCateogryIncome');
    if (isset($idIncome) && !empty($idIncome) && isset($moneyIncome) && !empty($moneyIncome) && isset($informationIncome) && !empty($informationIncomeUser) && isset($User_idUser) && !empty($User_idUser) && isset($CateogryIncome_idCateogryIncome) && !empty($CateogryIncome_idCateogryIncome)) {
        $incomeDao = new IncomeDaoImpl();
        $income = new Income();
        $income->setIdIncome($idIncome);
        $income->setMoneyIncome($moneyIncome);
        $income->setInformationIncome($informationIncome);
        $income->setTimeIncome($timeIncome);
        $income->setUser($User_idUser);
        $income->setCategoryIncome($CateogryIncome_idCateogryIncome);
        $incomeDao->addIncome($income);
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