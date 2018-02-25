<?php

include_once '../entity/User.php';
include_once '../entity/Outcome.php';
include_once '../dao/OutcomeDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $User_idUser = filter_input(INPUT_POST, 'User_idUser');
    if (isset($User_idUser) && !empty($User_idUser)) {
        $outcomeDao = new OutcomeDaoImpl();
        $outcome = new Outcome();
        $outcome->setUser($User_idUser);
        $outcomeDao->getOutcomeUser($outcome);
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