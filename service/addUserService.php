<?php

include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../util/PDOUtil.php';

$nameUser = filter_input(INPUT_POST, 'nameUser');
$emailUser = filter_input(INPUT_POST, 'emailUser');
$password = filter_input(INPUT_POST, 'password');
if (isset($nameUser) && !empty($nameUser) && isset($emailUser) && !empty($emailUser) && isset($password) && !empty($password)) {
    $userDao=new UserDaoImpl();
    $user=new User();
    $user->setNameUser($nameUser);
    $user->setEmailUser($emailUser);
    $user->setPassword($password);
    $userDao->setData($user);
    $result=$userDao->addUser();
    $jsonData = array();
    $jsonData['status'] = 1;
    $jsonData['message'] = 'Data successfully added';
} else {
    $jsonData = array();
    $jsonData['status'] = 2;
    $jsonData['message'] = 'Name is null';
}
header('Content-type:application/json');
echo json_encode($jsonData);