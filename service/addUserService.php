<?php

include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $nameUser = filter_input(INPUT_POST, 'nameUser');
    $emailUser = filter_input(INPUT_POST, 'emailUser');
    $password = filter_input(INPUT_POST, 'password');
    if (isset($nameUser) && !empty($nameUser) && isset($idUser) && !empty($idUser) && isset($emailUser) && !empty($emailUser) && isset($password) && !empty($password)) {
        $userDao = new UserDaoImpl();
        $user = new User();
        $user->setNameUser($nameUser);
        $user->setEmailUser($emailUser);
        $user->setPassword($password);
        $userDao->addUser($user);
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