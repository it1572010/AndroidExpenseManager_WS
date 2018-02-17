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
    $idOutcome= filter_input(INPUT_POST, 'idOutcome');
    if (isset($idOutcome) && !empty($idOutcome)) {
        $outcomeDao = new OutcomeDaoImpl();
        $outcome = new Outcome();
        $outcome->setIdOutcome($idOutcome);
        $outcomeDao->deleteOutcome($outcome);
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