<?php

include_once '../entity/User.php';
include_once '../entity/Income.php';
include_once '../entity/CategoryIncome.php';
include_once '../dao/UserDaoImpl.php';
include_once '../dao/IncomeDaoImpl.php';
include_once '../dao/CategoryIncomeDaoImpl.php';
include_once '../util/PDOUtil.php';

$moneyIncome = filter_input(INPUT_POST, 'moneyIncome');
$informationIncome = filter_input(INPUT_POST, 'informationIncome');
$timeIncome = filter_input(INPUT_POST, 'timeIncome');
$User_idUser = filter_input(INPUT_POST, 'User_idUser');
$CateogryIncome_idCateogryIncome = filter_input(INPUT_POST, 'CateogryIncome_idCateogryIncome');
if (isset($idIncome) && !empty($idIncome) && isset($moneyIncome) && !empty($moneyIncome) && isset($informationIncome) && !empty($informationIncomeUser) && isset($User_idUser) && !empty($User_idUser) && isset($CateogryIncome_idCateogryIncome) && !empty($CateogryIncome_idCateogryIncome)) {
    $incomeDao = new IncomeDaoImpl();
    $income = new Income();
    $income->setMoneyIncome($moneyIncome);
    $income->setInformationIncome($informationIncome);
    $income->setTimeIncome($timeIncome);
    $income->setUser($User_idUser);
    $income->setCategoryIncome($CateogryIncome_idCateogryIncome);
    $incomeDao->setDataIncome($income);
    $result=$incomeDao->addIncome();
    $jsonData = array();
    $jsonData['status'] = 1;
    $jsonData['message'] = 'Data successfully added';
} else {
    $jsonData = array();
    $jsonData['status'] = 2;
    $jsonData['message'] = 'Money is null';
}
header('Content-type:application/json');
echo json_encode($jsonData);