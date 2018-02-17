<?php

include_once '../entity/User.php';
include_once '../entity/Outcome.php';
include_once '../entity/CategoryOutcome.php';
include_once '../dao/UserDaoImpl.php';
include_once '../dao/OutcomeDaoImpl.php';
include_once '../dao/CategoryOutcomeDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $moneyOutcome = filter_input(INPUT_POST, 'moneyOutcome');
    $informationOutcome = filter_input(INPUT_POST, 'informationOutcome');
    $timeOutcome = filter_input(INPUT_POST, 'timeOutcome');
    $User_idUser = filter_input(INPUT_POST, 'User_idUser');
    $CateogryOutcome_idCateogryOutcome = filter_input(INPUT_POST, 'CateogryOutcome_idCateogryOutcome');
    if (isset($idOutcome) && !empty($idOutcome) && isset($moneyOutcome) && !empty($moneyOutcome) && isset($informationOutcome) && !empty($informationOutcomeUser) && isset($User_idUser) && !empty($User_idUser) && isset($CateogryOutcome_idCateogryOutcome) && !empty($CateogryOutcome_idCateogryOutcome)) {
        $outcomeDao = new OutcomeDaoImpl();
        $outcome = new Outcome();
        $outcome->setMoneyOutcome($moneyOutcome);
        $outcome->setInformationOutcome($informationOutcome);
        $outcome->setTimeOutcome($timeOutcome);
        $outcome->setUser($User_idUser);
        $outcome->setCategoryOutcome($CateogryOutcome_idCateogryOutcome);
        $outcomeDao->addOutcome($outcome);
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