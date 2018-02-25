<?php

include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../util/PDOUtil.php';

$nameUser = filter_input(INPUT_POST, 'nameUser');
$emailUser = filter_input(INPUT_POST, 'emailUser');
$password = filter_input(INPUT_POST, 'password');
if (isset($nameUser) && !empty($nameUser) && isset($idUser) && !empty($idUser) && isset($emailUser) && !empty($emailUser) && isset($password) && !empty($password)) {
    $userDao=new UserDaoImpl();
    $user=new User();
    $user->setNameUser($nameUser);
    $user->setEmailUser($emailUser);
    $user->setPassword($password);
    $userDao->setData($user);
    $result=$userDao->addUser();
    if (isset($result) && isset($result->name)) {
        $data = array('status' => 1, 'message' => 'Register succes', 'user' => $result);
    } else {
        $data = array('status' => 0, 'message' => 'Any field must be filled', 'user' => NULL);
    }
} else {
    $data=array('status'=>0,'message'=>'Any field must be filled');
}
header('Content-type:application/json');
echo json_encode($data);
//$apiKey = filter_input(INPUT_POST, 'api_key');
//header("content-type:application/json");
//if (isset($apiKey)) {
//    $nameUser = filter_input(INPUT_POST, 'nameUser');
//    $emailUser = filter_input(INPUT_POST, 'emailUser');
//    $password = filter_input(INPUT_POST, 'password');
//    if (isset($nameUser) && !empty($nameUser) && isset($idUser) && !empty($idUser) && isset($emailUser) && !empty($emailUser) && isset($password) && !empty($password)) {
//        $userDao = new UserDaoImpl();
//        $user = new User();
//        $user->setNameUser($nameUser);
//        $user->setEmailUser($emailUser);
//        $user->setPassword($password);
//        $userDao->addUser($user);
//        $jsonData = array();
//        $jsonData['status'] = 1;
//        $jsonData['message'] = 'Data successfully added';
//        echo json_encode($jsonData);
//    } else {
//        $jsonData = array();
//        $jsonData['status'] = 2;
//        $jsonData['message'] = 'Name is null';
//        echo json_encode($jsonData);
//    }
//} else {
//    $jsonData = array();
//    $jsonData['status'] = 2;
//    $jsonData['message'] = 'API Key not recognized';
//    echo json_encode($jsonData);
//}